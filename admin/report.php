<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	<link rel="icon" type="image/ico" href="assets/icon.png" />
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
	<style type="text/css">

		body{
			background-color: #f2f2f2;
		}

		.linechart{
			box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
			margin: 0;
			height: 300px; 
			width: 80%;
		}
		
	</style>
</head>
<body>
	<div id="sidebar"></div>
	<div id="header"></div>
	<div class="content">
		<h1>Report</h1>
		
		<br><br>
		<div id="chartContainer" class="linechart"></div>

	</div>
	<?php 
	include('include/dbcon.php');
	for($i = 1; $i <= 12; $i++)
	{
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE MONTH(regDate) = '$i'");
		$count = mysqli_num_rows($sql);
		$data[$i] = $count;
	}
	?>	

	<script type="text/javascript">
		window.onload = function () {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2",
				title:{
					text: "Total Customer"
				},
				axisX: {
					interval: 1,
					intervalType: "month",
					valueFormatString: "MMM"
				},
				axisY:{
					title: "Total of Customer",
					includeZero: false
				},
				data: [{        
					type: "line",       
					dataPoints: [
					{ x: new Date(2019, 00, 1),y: <?php echo $data[1] ?> },
					{ x: new Date(2019, 01, 1),y: <?php echo $data[2] ?> },
					{ x: new Date(2019, 02, 1),y: <?php echo $data[3] ?> },
					{ x: new Date(2019, 03, 1),y: <?php echo $data[4] ?> },
					{ x: new Date(2019, 04, 1),y: <?php echo $data[5] ?> },
					{ x: new Date(2019, 05, 1),y: <?php echo $data[6] ?> },
					{ x: new Date(2019, 06, 1),y: <?php echo $data[7] ?> },
					{ x: new Date(2019, 07, 1),y: <?php echo $data[8] ?> },
					{ x: new Date(2019, 08, 1),y: <?php echo $data[9] ?> },
					{ x: new Date(2019, 09, 1),y: <?php echo $data[10] ?> },
					{ x: new Date(2019, 10, 1),y: <?php echo $data[11] ?> },
					{ x: new Date(2019, 11, 1),y: <?php echo $data[12] ?> }
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