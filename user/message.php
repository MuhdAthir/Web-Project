<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
};

if(isset($_POST['btnSend']))
{
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$msg = $_POST['msg'];
	
	mysqli_query($conn, "INSERT INTO `message` (`id`, `date`, `customer`, `contact`, `message`) VALUES (NULL, CURRENT_TIMESTAMP, '$email', '$contact', '$msg')");
	echo "<script> alert('Message has been sent'); window.location.href = window.location.href</script>";
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
					<a class="btn-primary" style="width: 30%;border-radius: 15px 0px 0px 15px;" href="users.php">Your Profile</a>
					<a class="btn-primary" style="width: 30%;border-radius: 0em 0px 0px 0em;" href="order.php">Your Order</a>
					<a class="btn-secondary" style="width: 30%;border-radius: 0em 15px 15px 0em;" href="order.php">Contact Admin</a>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>
								<center>Give feedback to admin</center>
							</th>
						</tr>
						<tr>
							<td>
								<input name="email" value="<?php echo $user['email'] ?>" hidden="">
								<input name="contact" value="<?php echo $user['contactno'] ?>" hidden="">
								<textarea name="msg" class="form-input" rows="3" type="text" placeholder="Your message.." required></textarea>
							</td>
						</tr>						
						<tr>
							<td>
								<button name="btnSend" class="btn-secondary" style="width: 100%">Send Message</button>			
							</td>
						</tr>
					</table>
		</div>
		</form>
		</div>
	</div>
	<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>