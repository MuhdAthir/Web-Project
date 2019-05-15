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
	<div class="card-header"><strong>Your cart</strong></div>
	  <div class="card-body">
		  <div class="cart">
		  <tbody>
			<?php
			$sql = "SELECT * FROM cart c, product p WHERE (c.user_id = '".$user['user_id']."' AND c.status = 1)  AND p.product_id = c.product_id";
			$loopcart = loopSQL($conn, $sql);
			while($row = $loopcart->fetch_assoc()){
			?>
			  <div class="cart-child">
						<div class="grid-container" style="grid-template-columns: 15% 85%;">
						<div class="grid-item" style="padding: 14px">
							<img src="../admin/productimages/<?php echo $row['product_id'].'/'.$row['product_image'] ?>" alt="" class="img-pro card" style="height: 163px;">
						</div>
						<div class="grid-item" style="padding: 30px">
							<table class="table">
								<tr>
									<td colspan="2">
										<?php echo $row['product_name'] ?>
									</td>
								</tr>
								<tr>
									<td>Price</td>
									<td>RM
										<?php echo $row['price'] ?>
									</td>
								</tr>
								<tr>
									<td>Quantity</td>
									<td><?php echo $row['qty'] ?></td>
								</tr>
							</table>
						</div>
					</div> 
			  </div>
			<?php } ?>
		</div>
	  </div>
	</div>
	</div>
</div>

	
<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>