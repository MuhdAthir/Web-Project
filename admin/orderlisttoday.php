<!DOCTYPE html>
<html>
<head>
	<title>Order List</title>
	 <link rel="icon" type="image/ico" href="assets/icon.png" />
     <script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
	 <style type="text/css">
	 	
	 </style>
</head>
<body>
    <div id="sidebar"></div>
    <div id="header"></div>

	<div class="content">
		<h1>Order List</h1>
		<br>
		<table border="1" style="width:100%" cellpadding="5">
        <thead align="left" >
            <tr bgcolor=" #cccccc">
                <th>Name</th>
                <th>Code</th>
                <th align="center">Total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Syafiq</td>
                <td>876534abvdge</td>
                <td align="center">45</td>
                <td>6/4/2019</td>
                <td class="status">Processing</td>
                <td>
                	<select onchange="changestat('0', this)">
					  <option value="Processing">Processing</option>
					  <option value="Success">Success</option>
					  <option value="Cancel">Cancel</option>
					</select>
				</td>
            </tr>
            
            
        </tbody>
    </table>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );

		function changestat( statid, selectid )
		{
			var test = document.getElementsByClassName('status');
			test[statid].innerHTML = selectid.value;
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