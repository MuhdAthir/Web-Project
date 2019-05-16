<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
};

$pro = getAllDatafrom( $conn, "product", "product_id", $_GET[ 'id' ] );

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
						<div class="grid-item">
							<img src="../admin/productimages/<?php echo $pro['product_image'] ?>" alt="" class="img-pro card" style="height: 400px">
						</div>
						<div class="grid-item" style="padding: 30px">
							<table class="table">
								<tr>
									<td colspan="2">
										<?php echo $pro['product_name'] ?>
									</td>
								</tr>
								<tr>
									<td>Price</td>
									<td>RM
										<?php echo $pro['price'] ?>
									</td>
								</tr>
								<tr>
									<td>Stock</td>
									<td>Unavailable</td>
								</tr>
								<tr>
									<td>Color</td>
									<td width="50%">
										<marquee id="showmar"><em>Try to hover the color palette</em>
										</marquee><a id="showcolor" style="display: none"></a>
									</td>
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
							<form name="addcart" method="post">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" onclick="addplus('minus')"><i class="fas fa-minus"></i></span>
									</div>
									<input value="<?php echo $user['user_id'] ?>" name="userid" hidden>
									<input value="<?php echo $_GET['id'] ?>" name="item" hidden>
									<input type="number" min="0" max="10" value="0" class="form-control" style="padding: 10px" name="qty">
									<div class="input-group-append">
										<span class="input-group-text" onclick="addplus('add')"><i class="fas fa-plus"></i></span>
									</div>
									<div class="input-group-append">
										<button class="input-cart" type="button" onclick="checkqty()"><strong>Add to Cart</strong></button>
									</div>
								</div>
							</form>
							<center><p id="popup" style="display: none;">Added to cart</p></center>
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
	
	var popup = 
	function getColor( color ) {
		var show = document.getElementById( 'showcolor' );
		var mar = document.getElementById( 'showmar' );
		show.style.display = 'block';
		mar.style.display = 'none';
		show.innerHTML = color.getAttribute( 'name' );
	}

	function hideColor( color ) {
		var show = document.getElementById( 'showcolor' );
		var mar = document.getElementById( 'showmar' );
		show.style.display = 'none';
		mar.style.display = 'block';
	}

	function checkqty() {
		var qty = document.addcart.qty;
		var userid = document.addcart.userid;
		var item = document.addcart.item;
		if ( qty.value == 0 ) {
			alert( 'Choose at least 1 quantity' );
			qty.focus();
		} else {
			$.post( "../jquery_post.php", //Required URL of the page on server
				{ // Data Sending With Request To Server
					itemid: item.value,
					user_id: userid.value,
					itemqty: qty.value

				},
				function ( response ) { // Required Callback Function
					$( "#cart" ).load( window.location.href + " #cart" );
					document.getElementById('popup').style.display = 'block';
					setTimeout(function(){ document.getElementById('popup').style.display = 'none'; }, 3000);
				} );
		}
	}

	function addplus( what ) {
		var qty = document.addcart.qty;

		if ( qty.value != '' ) {
			if ( what == 'minus' ) {
				if ( qty.value != 0 ) {
					qty.value = parseInt( qty.value ) - 1;
				}
			} else {
				if ( qty.value < parseInt( qty.max ) )
					qty.value = parseInt( qty.value ) + 1;
			}

		} else {
			qty.value = 0;
		}

	}
</script>