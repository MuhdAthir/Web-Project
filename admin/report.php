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