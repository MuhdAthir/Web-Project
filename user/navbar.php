<?php
$user = getAllDatafrom( $conn, "users", "email", $_SESSION[ "email" ] );
$cart = mysqli_query( $conn, "SELECT * FROM cart WHERE user_id = '" . $user[ 'user_id' ] . "' AND status = 1" );
$cart = mysqli_num_rows( $cart );
?>
<div class="topnav" id="myTopnav">
	<a href="users.php" class="title"><?php echo $_SESSION['email'] ?></a>
	<a class="title" href="logout.php" onclick="return confirm('Are you sure to logout?');"><i class="fas fa-sign-out-alt"></i>Logout</a>
	<a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart(<b style="color: blueviolet"><?php echo $cart?></b>)</a>
	<a href="#hot"><i class="fas fa-level-up-alt"></i> Best Selling</a>
	<a href="product.php"><i class="fas fa-tshirt"></i> Product</a>
	<a href="index.php" class="nav-active"><i class="fas fa-home"></i> Home</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i> </a>
</div>
<script>
	function myFunction() {
		var x = document.getElementById( "myTopnav" );
		if ( x.className === "topnav" ) {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
</script>