<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
};

if ( isset( $_POST[ 'btnUpt' ] ) ) {

	$email = $_SESSION[ 'email' ];
	$sname = $_POST[ 'shipsname' ];
	$sadd = $_POST[ 'shipsadd' ];
	$scity = $_POST[ 'shipscity' ];
	$spost = $_POST[ 'shippost' ];
	$contactno = $_POST[ 'contactno' ];
	$sship = $_POST[ 'shipstate' ];
	$bname = $_POST[ 'billname' ];
	$badd = $_POST[ 'billadd' ];
	$bcity = $_POST[ 'billcity' ];
	$bstate = $_POST[ 'billstate' ];
	$bpost = $_POST[ 'billpost' ];
	$password = $_POST[ 'password' ];

	mysqli_query( $conn, "UPDATE users SET name = '$sname', billingName = '$bname', contactno = '$contactno', password = '$password', shippingAddress = '$sadd', shippingCity = '$scity', shippingPostcode = '$spost', shippingState = '$sship', billingAddress = '$badd', billingCity = '$bcity', billingPostcode = '$bpost',billingState = '$bstate' WHERE email = '$email'" );
		
	echo "<script> window.location.href = window.location.href </script>";
}
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
					<a class="btn-secondary" style="width: 30%;border-radius: 15px 0px 0px 15px;" href="users.php">Your Profile</a>
					<a class="btn-primary" style="width: 30%;border-radius: 0em 0px 0px 0em;" href="order.php">Your Order</a>
					<a class="btn-primary" style="width: 30%;border-radius: 0em 15px 15px 0em;" href="message.php">Contact Admin</a>
				</div>
				<div class="card-body">
					<?php
					$email = $_SESSION[ 'email' ];
					$sqli = "SELECT * FROM users WHERE email='$email'";
					$result = mysqli_query( $conn, $sqli );
					$cek = mysqli_num_rows( $result );
					?>
					<?php if($cek>0) {
				while($row = mysqli_fetch_assoc($result)) { 
					?>
					<table class="table">
						<tr>
							<td style="width: 30%">Registration Date :</td>
							<td>
								<?php echo $row['regDate'] ?>
							</td>
						</tr>
						<tr>
							<th colspan="2">
								<center>Shipping Detail</center>
							</th>
						</tr>
						<tr>
							<td>Name :</td>
							<td>
								<input name="shipsname" class="form-input" type="text" placeholder="Full Name" value="<?php echo $row['name'] ?>">
							</td>
						</tr>
						<tr>
							<td>Email :</td>
							<td><input name="email" class="form-input" type="text" placeholder="Full Name" value="<?php echo $row['email'] ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>Password :</td>
							<td><input name="password" class="form-input" type="password" placeholder="Password" value="<?php echo $row['password'] ?>" required>
							</td>
						</tr>
						<tr>
							<td>Contact Number :</td>
							<td> <input name="contactno" class="form-input" type="number" placeholder="Contact No" value="0<?php echo $user['contactno'] ?>">
							</td>
						</tr>
						<tr>
							<td>Shipping Address :</td>
							<td> <input name="shipsadd" class="form-input" type="text" placeholder="Address 1" value="<?php echo $user['shippingAddress'] ?>">
								<input name="shippost" class="form-input" type="number" min="0" maxlength="6" onInput="javascript: if (this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength)}" placeholder="Postcode" value="<?php echo $user['shippingPostcode'] ?>">
								<input name="shipscity" class="form-input" type="text" placeholder="Address 2" value="<?php echo $user['shippingCity'] ?>">
								<select class="form-input" name="shipstate">
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
							


							</td>
						</tr>
						<tr>
							<th colspan="2">
								<center>Billing Detail</center>
							</th>
						</tr>
						<tr>
							<td>Name</td>
							<td> <input name="billname" class="form-input" type="text" placeholder="Full Name" value="<?php echo $user['billingName'] ?>">
							</td>
						</tr>
						<tr>
							<td>Billing Address :</td>
							<td>
								<input name="billadd" class="form-input" type="text" placeholder="Address 1" value="<?php echo $user['billingAddress'] ?>">
								<input class="form-input" type="number" min="0" maxlength="6" onInput="javascript: if (this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength)}" placeholder="Postcode" value="<?php echo $user['billingPostcode'] ?>" name="billpost">
								<input name="billcity" class="form-input" type="text" placeholder="Address 2" value="<?php echo $user['billingCity'] ?>">
								<select class="form-input" name="billstate">
										<option value="<?php echo $user['billingState'] ?>" selected hidden><?php echo $user['billingState'] ?></option>
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
							</td>
						</tr>
						<tr>
							<td colspan="2"><button name="btnUpt" class="btn-secondary" style="width: 100%">Update Profile</button>
							</td>
						</tr>
					</table>
		</form>
		<?php }}?>
		</div>
		</div>
	</div>
	<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>