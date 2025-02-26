<?php
include_once("config.php");
require __DIR__ . '../../src/bootstrap.php';

?>

<!DOCTYPE html>
<html>
<head>
<?php view('header', ['title' => 'Home']) ?>
<?php view('nav') ?>

<body>
<h1 align="center" class="page-title">View Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0" >
    <thead style="background-color:#D7CEC7;">
    	<tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr>
    </thead>
  <tbody>
 	<?php
	 $grand_total="";
	 $list_tax = "";
	if(isset($_SESSION["cart_products"])) //check session var
    {

		if(is_user_logged_in()) //check if the user log in or not
		{
			$total = 0; //set initial total value
			$b = 0; //var for zebra stripe table 
			foreach ($_SESSION["cart_products"] as $cart_itm)
			{
				//set variables to use in content below
				$product_name = $cart_itm["product_name"];
				$product_qty = $cart_itm["product_qty"];
				$product_price = $cart_itm["product_price"];
				$product_code = $cart_itm["product_code"];
				$product_color = $cart_itm["product_color"];
				$subtotal = ($product_price * $product_qty); //calculate Price x Qty
				
				$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
				echo '<tr class="'.$bg_color.'">';
				echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
				echo '<td>'.$product_name.'</td>';
				echo '<td>'.$currency.$product_price.'</td>';
				echo '<td>'.$currency.$subtotal.'</td>';
				echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
				echo '</tr>';
				$total = ($total + $subtotal); //add subtotal to total var
			}
			
			if (!empty($_SESSION["cart_products"])){
				$grand_total = $total + $shipping_cost; 
			}else{
				$grand_total = $total;
			}
			//grand total including shipping cost
			foreach($taxes as $key => $value){ //list and calculate all taxes in array
					$tax_amount     = round($total * ($value / 100));
					$tax_item[$key] = $tax_amount;
					$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
			}
			

			$list_tax       = '';
			foreach($tax_item as $key => $value){ //List all taxes
				$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
			}
			$shipping_cost = (!empty($_SESSION["cart_products"]))?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':"";
			}
			else{
				redirect_to('/assignment2/login');
			}
			
	}
    ?>
    <tr>
        <td colspan="5">
            <span style="float:right;text-align: right;">
            <?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("$%01.2f", $grand_total);?>
            </span>
        </td>
    </tr>
    <tr>
        <td colspan="5">
            <a href="index.php" class="button">Add More Items</a>
            <button type="submit">Update</button>
            <div class="paypal-button"><a  href="paypal-express-checkout" ><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" width="179" height="36"></a></div>
        </td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

<?php view('footer') ?>
