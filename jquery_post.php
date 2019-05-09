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

?>