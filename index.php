<?php

include('admin/include/dbcon.php');
include('function.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crafted by Soul</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/all.css">
<script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
</head>
<body>
<?php include('navbar.php') ?>
	
<div class="slideshow-container">
  <div class="mySlides fade"> 
	  <img src="img/12871e75003b776d1e8f60623518.jpeg"> 
	</div>
  <div class="mySlides fade"> 
	  <img src="img/375c552ae8ddf39f56fcf177d02b.jpeg"> 
	</div>
  <div class="mySlides fade"> 
	  <img src="img/peacock-birds-and-flowers-japanese-print-art-header.jpg"> 
	</div>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> </div>
<br>
<div style="text-align:center"> 
	<span class="dot" onclick="currentSlide(1)"></span> 
	<span class="dot" onclick="currentSlide(2)"></span> 
	<span class="dot" onclick="currentSlide(3)"></span> 
</div>
<script src="js/all.js" type="text/javascript"></script>
</body>
</html>