<?php 

include('include/dbcon.php');
include('include/session.php');

$product_id = $_GET['product_id'];

if(isset($_POST['submit']))
{
	$res=mysqli_query($conn,"SELECT * FROM product WHERE product_id='".$product_id."'");
  	$row=mysqli_fetch_array($res);
  	$image=$row['product_image'];
  	unlink("productimages/".$image);

	$productimage=$_FILES["productimage"]["name"];

	move_uploaded_file($_FILES["productimage"]["tmp_name"],"productimages/".$_FILES["productimage"]["name"]);
	$sql=mysqli_query($conn,"update  product set product_image='$productimage' where product_id='$product_id' ");

	echo "<script>alert('Image Update!'); window.location = 'productlist.php?';</script>";

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="icon" type="image/ico" href="assets/icon.png" />
	<script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
	<style type="text/css">

		body{
			background-color: #f2f2f2;
		}

		.buttonAdd{
			background-color: #5cb85c;
			color: white;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			min-height: 25px;
			border-radius: 3px;
		}

		button:hover {
			opacity: 0.8;
		}

		form{
			display: table;
			background-color: #fff;
			box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
			padding: 20px;
			width: 40%;
		}

		input, select, label{
			/*margin-left: 15px*/
			display: table-cell;
		}

		p{
			display: table-row;
		}

	</style>
</head>
<body>
	<div id="sidebar"></div>
	<div id="header"></div>

	<div class="content">
		<h1>Edit Product</h1>
		<br>
		<div style="text-align: left;">
			<a href="productlist.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
		</div>
		<br>
		<div>

			<?php  

			if(isset($_GET["product_id"]))
			{
				$product_id = $_GET["product_id"];
			}

			$sql = "SELECT * FROM product WHERE product_id = '".$product_id."' ";

			$query = mysqli_query($conn,$sql);

			$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
			?>

			<form action="" id="productForm" name="insertproduct" method="post" enctype="multipart/form-data">
				
				<p>
					<label>Current Image</label>
					<img src="productimages/<?php echo $result['product_image'];?>" width="100" height="100">
				</p><br>
				<p>
					<label>New Image</label>
					<input type="file" name="productimage" id="productimage" value="">
				</p><br>


				<button type="submit" name="submit" class="buttonAdd">Update</button></a>
			</form>
		</div>




	</div>

	<script type="text/javascript">

		$(function(){
			$("#sidebar").load("include/sidebar.php"); 
		});

		$(function(){
			$("#header").load("include/header.php"); 
		});
	</script>

</body>
</html>