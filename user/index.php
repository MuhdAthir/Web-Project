<?php
	include('../admin/include/dbcon.php');
	include('../function.php');

	session_start();
	if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
	};
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crafted by Soul</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="../css/all.css">
<script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
</head>
<body>
<?php include('navbar.php') ?>

<div class="container">
	<div align="center">
	<div class="card" style="width: 90%;" align="left">
	<div class="card-header"><strong>Top 5 Best Selling</strong></div>
	  <div class="card-body">
		<ol>
		<li>Be Happy Mug</li>  
		<li>Nature Totebag</li>  
		<li>Butterfly Pencil Case</li>  
		<li>Smile Mug</li>  	
		<li>Flower Totebag</li>  
		</ol>
	  </div>
	</div>
	</div>
</div>

	
<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>