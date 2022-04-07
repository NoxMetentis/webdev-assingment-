<?php
$currency = 'RM'; //Currency Character or code

//MySql 

//paypal settings
$PayPalMode 			= 'live'; // sandbox or live
$PayPalApiUsername 		= 'angyongjie911_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword 		= 'FQCC6NG7R2GGPYUB'; //Paypal API password
$PayPalApiSignature 	= 'AndoiyBaSJMQU0x.LA1gzGhgCNPQAmV9gQZQ7U7Kj0RuSqbOWJKj8FSW'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://localhost/assignment/public/product/'; //Point to paypal-express-checkout page
$PayPalCancelURL 		= 'http://localhost/assignment/public/product/'; //Cancel URL if user clicks cancel

//Additional taxes and fees											
$HandalingCost 		= 0.00;  //Handling cost for the order.
$InsuranceCost 		= 0.00;  //shipping insurance cost for the order.
$shipping_cost      = 15.0; //shipping cost
$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );

//connection to MySql						

?>
