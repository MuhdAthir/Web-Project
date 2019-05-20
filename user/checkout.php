<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
};

$user = getAllDatafrom( $conn, "users", "email", $_SESSION[ "email" ] );
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
		<form action="pay.php" method="post">
		<div align="center">
			<div class="grid-container" align="left">
				<div class="grid-item" style="padding: 10px">
					<div class="card">
						<div class="card-header"><strong>Table Summary</strong>
						</div>
						<div class="card-body">
							<table class="table">
								<?php
								if ( isset( $_POST[ 'checkout' ] ) ) {
									$item = $_POST[ 'item' ];
									$total = 0;
									foreach ( $item as $row ) {
										$cart = getSQL( $conn, "SELECT * FROM cart c, product p WHERE (c.order_id = '$row')  AND p.product_id = c.product_id" );
										?>
								<input name="orderid[]" value="<?php echo $cart['order_id'] ?>" hidden>
								<tr>
									<td rowspan="4" width="25%"><img alt="" src="../admin/productimages/<?php echo $cart['product_image'] ?>" class="img-pro">
									</td>
									<td><?php echo $cart['product_name'] ?></td>
								</tr>
								<tr>
									<td>Unit Price: RM
										<?php echo $cart['price'] ?>
									</td>
								</tr>
								<tr>
									<td>Quantity:
										<?php echo $cart['qty'] ?>
									</td>
								</tr>
								<tr>
									<td>Total Price:
										<?php echo $subtotal = number_format((float)$cart['price']*$cart['qty'], 2, '.', ''); $total = $total + $subtotal; ?>
									</td>
								</tr>
								<?php
								}
								}
								?>
							</table>
						</div>
					</div>
				</div>
				<div class="grid-item" style="padding: 10px">
					<div class="card">
						<div class="card-header"><strong>Shipping Detail</strong>
						</div>
						<div class="card-body">
							<input name="shipsname" class="form-input" type="text" placeholder="Full Name" value="<?php echo $user['name'] ?>" required>
							<input name="shipsadd" class="form-input" type="text" placeholder="Address 1" value="<?php echo $user['shippingAddress'] ?>" required>
							<input name="shipscity" class="form-input" type="text" placeholder="Address 2" value="<?php echo $user['shippingCity'] ?>" required>
							<input name="contactno" class="form-input" type="number" placeholder="Contact No" value="<?php echo $user['contactno'] ?>" required>
							<div class="row">
								<div class="col-6">
									<input name="shippost" class="form-input" type="number" min="0" maxlength="6" onInput="javascript: if (this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength)}" placeholder="Postcode" value="<?php echo $user['shippingPostcode'] ?>" required>
								</div>
								<div class="col-6">
									<select class="form-input" name="shipstate" required>
					<option value="<?php echo $user['shippingState'] ?>" selected hidden><?php echo $user['shippingState'] ?></option>
					<option value="Perlis">Perlis</option>
					<option value="Perak">Perak</option>
					<option value="Pulau Pinang">Pulau Pinang</option>
					<option value="Kedah">Kedah</option>
					<option value="Kelantan">Kelantan</option>
					<option value="Terengganu">Terengganu</option>
					<option value="Pahang">Pahang</option>
					<option value="Johor">Johor</option>
					<option value="Melaka">Melaka</option>
					<option value="Negeri Sembilan">Negeri Sembilan</option>
					<option value="Selangor">Selangor</option>
					<option value="Sarawak">Sarawak</option>
					<option value="Sabah">Sabah</option>
					<option value="Wilayah Kuala Lumpur">Wilayah Kuala Lumpur</option>
					<option value="Wilayah Putrajaya">Wilayah Putrajaya</option>
					<option value="Wilayah Labuan">Wilayah Labuan</option>
				</select>
								

								</div>
							</div>
						</div>
						<div class="card-header"><strong>Billing Detail</strong>
						<label><input type="checkbox" name="check" onChange="showhide(this)"> Same with shipping address</label>
						</div>
						<div class="card-body" id="billdiv">
							<input name="billname" class="form-input" type="text" placeholder="Full Name" value="<?php echo $user['billingName'] ?>" >
							<input name="billadd" class="form-input" type="text" placeholder="Address 1" value="<?php echo $user['billingAddress'] ?>" >
							<input name="billcity" class="form-input" type="text" placeholder="Address 2" value="<?php echo $user['billingCity'] ?>" >
							<div class="row">
								<div class="col-6">
									<input class="form-input" type="number" min="0" maxlength="6" onInput="javascript: if (this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength)}" placeholder="Postcode" value="<?php echo $user['billingPostcode'] ?>" name="billpost" >
								</div>
								<div class="col-6">
									<select class="form-input" name="billstate" >
										<option value="<?php echo $user['billingState'] ?>" selected hidden><?php echo $user['shippingState'] ?></option>
										<option value="Perlis">Perlis</option>
										<option value="Perak">Perak</option>
										<option value="Pulau Pinang">Pulau Pinang</option>
										<option value="Kedah">Kedah</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Terengganu">Terengganu</option>
										<option value="Pahang">Pahang</option>
										<option value="Johor">Johor</option>
										<option value="Melaka">Melaka</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Selangor">Selangor</option>
										<option value="Sarawak">Sarawak</option>
										<option value="Sabah">Sabah</option>
										<option value="Wilayah Kuala Lumpur">Wilayah Kuala Lumpur</option>
										<option value="Wilayah Putrajaya">Wilayah Putrajaya</option>
										<option value="Wilayah Labuan">Wilayah Labuan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-header"><strong>Summary</strong>
						</div>
						<div class="card-body">
							<table class="table">
								<tr>
									<td>Item</td>
									<td>
										<?php echo count($item) ?>
									</td>
								</tr>
								<tr>
									<td>Price</td>
									<td>RM
										<?php echo number_format((float)$total, 2, '.', '') ?>
									</td>
								</tr>
								<tr>
									<td>Shipping fee</td>
									<td>RM 2.50</td>
								</tr>
								<tr>
									<th>Total</th>
									<th>RM
										<input value="<?php echo number_format((float)$total+2.50, 2, '.', '') ?>" name="price" hidden>
										<?php echo number_format((float)$total+2.50, 2, '.', '') ?>
									</th>
								</tr>
							</table>
							<button class="btn-secondary" style="width: 100%" name="pay"><i class="fab fa-paypal"></i> Pay</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
	<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>
<script>
function showhide(input)
	{
		if(input.checked == true)
			{
				$('#billdiv').hide();
			}else{
				$('#billdiv').show();
			}
	}
</script>