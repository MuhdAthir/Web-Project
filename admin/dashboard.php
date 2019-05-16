 <?php
	 include('include/session.php');
	 date_default_timezone_set('Asia/Kuala_Lumpur');
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

		.grid-container2 {
		  display: grid;
		  grid-template-columns: 100%;
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
				<p style="padding: 10px"> 
				<?php
				include('include/dbcon.php');

				$f1="00:00:00";
				$from=date('Y-m-d')." ".$f1;
				$t1="23:59:59";
				$to=date('Y-m-d')." ".$t1;

				$status='Delivered';

				$query = mysqli_query($conn,"SELECT COUNT(*) AS r FROM orders WHERE orderDate BETWEEN '$from' and '$to' and orderStatus!='$status'");
				$query = $query->fetch_assoc();
				echo $query['r'];
				?> New Orders!</p> 
				<hr>
				<a href="orderlisttoday.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			<div>
				<p style="padding: 10px">0 Pending Orders!</p> 
				<hr>
				<a href="orderlist.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			<div>
				<p style="padding: 10px"> 
				<?php
				include('include/dbcon.php');
        $query = mysqli_query($conn,"SELECT COUNT(*) AS r FROM product");
				$query = $query->fetch_assoc();
				echo $query['r'];
				?> Total  Products!</p> 
				<hr>
				<a href="productlist.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>

			<div>
				<p style="padding: 10px"> 
				<?php
				
				include('include/dbcon.php');

				$f1="00:00:00";
				$from=date('Y-m-d')." ".$f1;
				$t1="23:59:59";
				$to=date('Y-m-d')." ".$t1;

				$query = mysqli_query($conn,"SELECT COUNT(*) AS r FROM message WHERE date BETWEEN '$from' and '$to'");
				$query = $query->fetch_assoc();
				echo $query['r'];
				?>
				New Message!</p> 
				<hr>
				<a href="message.php"><p style="padding-left: 10px; padding-right: 10px">View Detail <span style="float: right;"><i class="fas fa-angle-right"></i></span> </p></a>
			</div>
		</div>
		<br><br>

		<!-- <div style="width: 50%">
			<div style="width: 50%">
			<div id="chartContainer" class="linechart"></div>
		</div> -->
		</div>

		
		
		

		

	</div>

	<script type="text/javascript">
		window.onload = function () {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Total Customer"
			},
			axisY:{
				includeZero: false
			},
			data: [{        
				type: "line",       
				dataPoints: [
					{ y: 15 },
					{ y: 20 },
					{ y: 10 },
					{ y: 34 , indexLabel: "highest",markerColor: "red", markerType: "triangle" },
					{ y: 12 },
					{ y: 15 },
					{ y: 17 },
					{ y: 20 },
					{ y: 21 },
					{ y: 6 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
					{ y: 10 },
					{ y: 20 }
				]
			}]
		});
		chart.render();

		}

		$(function(){
	      $("#sidebar").load("include/sidebar.php"); 
	    });

	    $(function(){
	      $("#header").load("include/header.php"); 
	    });

	</script>

</body>
</html>