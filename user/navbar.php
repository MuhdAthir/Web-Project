<?php 
$user = getAllDatafrom( $conn, "users", "email", $_SESSION[ "email" ] );
?>
<div class="topnav" id="myTopnav"> 
	<a href="#home" class="title"><?php echo $_SESSION['email'] ?></a> 	
	<div id="cart">
	<?php
	$cart = mysqli_query($conn,"SELECT * FROM cart WHERE user_id = '".$user['user_id']."'");
	$cart = mysqli_num_rows($cart);
	?>
	<a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart(<b style="color: blueviolet"><?php echo $cart?></b>)</a> 
	</div>
	<a href="#news"><i class="fas fa-level-up-alt"></i> Best Selling</a> 
	<a href="product.php"><i class="fas fa-tshirt"></i> Product</a> 
	<a href="index.php" class="nav-active"><i class="fas fa-home"></i> Home</a> 
	<a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i> </a> 
</div>