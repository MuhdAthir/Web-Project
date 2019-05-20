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
	<link rel="icon" type="image/ico" href="admin/assets/icon.png"/>
	<script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
</head>

<body>
	<?php include('navbar.php') ?>

	<div class="container" align="center">
		<form method="post">
			<div class="card" style="width: 50%;" align="center">
				<div class="card-header">
					<a class="btn-primary" style="width: 30%;border-radius: 15px 0px 0px 15px;" href="users.php">Your Profile</a>
					<a class="btn-secondary" style="width: 30%;border-radius: 0em 0px 0px 0em;" href="order.php">Your Order</a>
					<a class="btn-primary" style="width: 30%;border-radius: 0em 15px 15px 0em;" href="message.php">Contact Admin</a>
				</div>
				<div class="card-body">
					<?php
					$sql = "SELECT * FROM cart c, product p WHERE (c.user_id = '" . $user[ 'user_id' ] . "' AND c.status = 2)  AND p.product_id = c.product_id";
					$loopcart = loopSQL( $conn, $sql );
					while ( $cart = $loopcart->fetch_assoc() ) {
						?>
					<table class="table">
						<tr>
							<td rowspan="5" width="25%"><img alt="" src="../admin/productimages/<?php echo $cart['product_image'] ?>" class="img-pro">
							</td>
							<td><?php echo $cart['product_name'] ?></td>
						</tr>
						<tr>
							<td><strong>Unit Price:</strong> RM
								<?php echo $cart['price'] ?>
							</td>
						</tr>
						<tr>
							<td><strong>Quantity:</strong>
								<?php echo $cart['qty'] ?>
							</td>
						</tr>
						<tr>
							<td><strong>Total Price:</strong>
								<?php echo $subtotal = number_format((float)$cart['price']*$cart['qty'], 2, '.', ''); ?>
							</td>
						</tr>						
						<tr>
							<td><strong>Status:</strong> Paid, Processing
							</td>
						</tr>
					</table>
		</form>
		<?php }?>
		</div>
		</div>
	</div>
	<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>