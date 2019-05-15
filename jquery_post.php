<?php

include('admin/include/dbcon.php');

if(isset($_POST['email']))
{
	$call = mysqli_query($conn,"SELECT * FROM users WHERE email = '".$_POST['email']."'");
	$call = mysqli_num_rows($call);
	
	if( $call < 1)
	{
		echo "Y";
	}else
	{
		echo "N";
	}
}

if(isset($_POST['itemid']))
{
	$call = mysqli_query($conn,"SELECT * FROM turn WHERE turn_id = 1");
	$call = $call->fetch_assoc();
	
	$orderid = $call['order_id'] + 1;
	$item = $_POST['itemid'];
	$user = $_POST['user_id'];
	$qty = $_POST['itemqty'];
	
	mysqli_query($conn,"INSERT INTO `cart` (`order_id`, `product_id`, `user_id`, `qty`, `status`) VALUES ('$orderid', '$item', '$user', '$qty', '1');");	
	
	mysqli_query($conn,"UPDATE `turn` SET `order_id` = '$orderid' WHERE `turn`.`turn_id` = 1");
		
}

?>