<?php
   include('include/session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboards</title>
	 <link rel="icon" type="image/ico" href="assets/icon.png" />
	 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	 <script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
	 <style type="text/css">

	 	body{
	 		background-color: #f2f2f2;
	 	}

	 	.grid-container {
		  display: grid;
		  grid-template-columns: 23% 23% 23% 23%;
		  grid-gap: 30px;
		}

		.grid-container > div {
		  font-size: 15px;
		  background-color: #fff;
		  box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
		}

		.linechart{
			box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
			margin: 0;
  			height: 300px; 
  			width: 100%
		}
		
	 </style>
</head>
<body>
	<div id="sidebar"></div>
	<div id="header"></div>
	<div class="content">
		<h1>Dashboard</h1>
		<div class="grid-container">
			<div>
				<p style="padding: 10px">4 New Orders!</p> 
				<hr>
				<a href="orderlist.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			<div>
				<p style="padding: 10px">0 Pending Orders!</p> 
				<hr>
				<a href="orderlist.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			<div>
				<p style="padding: 10px">2 Total  Products!</p> 
				<hr>
				<a href="productlist.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			<div>
				<p style="padding: 10px">1 Message!</p> 
				<hr>
				<a href="message.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			
		</div>
		<br><br>

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