<?php
include('../admin/include/dbcon.php');
include('../function.php');

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
header( "Location: ../index.php" );
};

$pro = getAllDatafrom($conn, "product","product_id",$_GET['id']);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crafted by Soul</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="../css/all.css">
<script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
</head>
<body>
<?php include('navbar.php') ?>

<div class="container">
	<div align="center">
		<div class="card" style="width: 90%;" align="left">
		  <div class="card-body">
		  <div class="grid-container">
			 <div class="grid-item" >
            	<img src="../admin/productimages/<?php echo $pro['product_id'].'/'.$pro['product_image'] ?>" alt="" class="img-pro card" style="height: 400px">
        	</div>			 
			  <div class="grid-item" style="padding: 30px">
              <table class="table">
                <tr>
                  <td colspan="2"><?php echo $pro['product_name'] ?></td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td>RM <?php echo $pro['price'] ?></td>
                </tr>
                <tr>
                  <td>Stock</td>
                  <td>Unavailable</td>
                </tr>                
				<tr>
                  <td>Color</td>
                  <td width="50%"><marquee id="showmar"><em>Try to hover the color palette</em></marquee><a id="showcolor" style="display: none"></a></td>
                </tr>
              </table>
				  <br>
				  <div class="grid-palet">
					  <div class="grid-item-palet" style="background-color: #d8d8d8" name="Alto" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #c0c0c0" name="Silver" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #a8a890" name="Gray Silver" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>  
					  <div class="grid-item-palet" style="background-color: #c04848" name="Crail" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #787860" name="Flax Smoke" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #909078" name="Granite Green" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>  
					  <div class="grid-item-palet" style="background-color: #606060" name="Scorpion" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #c06060" name="Fuzzy Wuzzy Brown" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #c09048" name="Tussock" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
					  <div class="grid-item-palet" style="background-color: #903030" name="Stiletto" onmouseover="getColor(this)" onmouseout="hideColor(this)"></div>
				   </div>
				  <br><br>
				  <a class="btn-secondary" style="width: 100%" href="checkout.php"><strong>Add to Cart</strong></a>
			  </div>
		  </div>
		</div>
		</div>
	</div>
</div>
<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>

	<script>
		
	function getColor( color )
	{
		var show = document.getElementById('showcolor');
		var mar = document.getElementById('showmar');
		show.style.display = 'block';
		mar.style.display = 'none';
		show.innerHTML = color.getAttribute('name');
	}	
		
	function hideColor( color )
	{
		var show = document.getElementById('showcolor');
		var mar = document.getElementById('showmar');
		show.style.display = 'none';
		mar.style.display = 'block';
	}
</script>