<?php

require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'company']) ?>
<a id="Gallery"></a>
<?php view('nav') ?>


<p>Welcome <?= current_user() ?> <a href="logout.php">Logout</a></p>


<div class=maincontent>
<a id="Slideshow">	<div class="Slideshow"></a>

<h1>The Gallery</h1>	
<br>

<div class="slideshow-container">

	<!-- Full-width images with number and caption text -->

	<div class="mySlides">
	  <div class="numbertext">1 / 4</div>
	  <img src="../src/inc/image/Cat1.jpg" height="450px" width="450px">
	  <div class="text"> Series Nya: Delirious</div>
	</div>
	<div class="mySlides">
	  <div class="numbertext">2 / 4</div>
	  <img src="../src/inc/image/Cat2.png"height="450px" width="450px">
	  <div class="text">The Siam 2 from the Siamese Catalouge</div>
	</div>
	<div class="mySlides">
	  <div class="numbertext">3 / 4</div>
	  <img src="../src/inc/image/cat3.jpg" height="450px" width="450px">
	  <div class="text">Russian Blue: X-Factor</div>
	</div>
	<div class="mySlides">
		<div class="numbertext">4 / 4</div>
		<img src="../src/inc/image/Cat4.jpg" height="450px" width="450px">
		<div class="text"> Norwegian Forest: Act 3</div>
	  </div>	
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <a id="Story"></a>
  <br>
  
  


</div>
<div class=maincontent>
	<div class="Story">
		<h1>Our Story</h1>
		<br>
		Our founder John C. Atlover had a vision, to provide his fellow feline enthusiasts a means of expression through the sporting of luxury timepieces. It has inspired our company through the course of 10 years to increase both utility and beauty of the watch. In 2012, we established CatWatch, the worlds first watch makers to specifically cater to the needs of our cat loving friends, it was immediately recognized as the new global phenomenon by markets worldwide.<br>

		<br>As the next decade arrives, our commitment to our vision will not waver and shall remain undiminished, but we aim to add a new, extra dimension to the watches we offer. We aim to create watches that have a strong emotional appeal and that will enrich the lives of our customers. Time is to be enjoyed and our aim is to bring joy to the people worldwide. 
		<br>
		<br>John C. Atlover 
		<br>C.E.O, Founder of CatWatch
		<br>
		<br>				
		
	</div>
	</div>
			<script>
				let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" activedot", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " activedot";
}

			</script>
<?php view('footer') ?>