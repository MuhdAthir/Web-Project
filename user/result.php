<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

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
			<br>
			<br>
			<br>
			<div class="card" style="width: 50%;" align="left">
				<div class="card-body" align="center">
					<?php if($_GET['status'] == 'success')
					{ 
					$item = explode(",",$_GET['item']);
					foreach($item as $item)
					{
						mysqli_query($conn,"UPDATE `cart` SET `status` = '2' WHERE `cart`.`order_id` = $item");
					}
					echo "<script> $( '#myTopnav' ).load( window.location.href + ' #myTopnav' ); </script>";
					?>
					<div style="padding: 5px; background: green; color: white; border-radius: 5em" align="center">
						<h3><i class="fas fa-check-circle"></i>Your payment has been accepted, your order will be process by supplier</h3>
					</div>
					<a class="btn-secondary" href="users.php">Check order</a>
					<?php
					} else {
						?>
					<div style="padding: 5px; background: red; color: white; border-radius: 5em" align="center">
						<h3><i class="fas fa-times-circle"></i>Your payment has been canceled or reject, contact adminstrator or try again</h3>
					</div>
					<a class="btn-secondary" href="cart.php">Go to cart</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>


	<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>