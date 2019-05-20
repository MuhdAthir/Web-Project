<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
};

$pro = getAllDatafrom( $conn, "product", "product_id", $_GET[ 'id' ] );
include_once( "colors.inc.php" );
$ex = new GetMostCommonColors();
$src = "../admin/productimages/" . $pro[ 'product_image' ];
$colors = $ex->Get_Color( $src, 8, 0, 0, 24 );
		$color_list = "";
		$percentage_list= "";
		$output = array();
foreach ( $colors as $hex => $percentage ) {
			if ( $percentage > 0 ) {
				$color_list = $color_list . "#" . $hex . ", ";
				$percentage_list = $percentage_list . $percentage . ", ";
				$c = array();
				$c["color"] = "#" . $hex;
				$c["percent"] = $percentage;
				$c["hue"] = $ex->Get_Hue($hex);
				$c["css3"] = "#" . $ex->Get_CSS3($hex);
				$c["spectrum"] = "#" . $ex->Get_Spectrum($hex);
				$output[] = $c;
			}
		}	
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
										<strong><?php echo $pro['product_name'] ?></strong>
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
									<td><?php echo $pro['stock'] ?></td>
								</tr>
							</table>
							<br>
							<div class="grid-palet">
								<?php foreach($output as $clr){ 
								?>
								<div class="grid-item-palet" style="background-color: <?php echo $clr['color'] ?>"><a style="color: white; font-size: 14px"><?php echo $clr['hue'] ?></a></div>
								<?php } ?>
							</div>
							<br><br>
							<form name="addcart" method="post">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" onclick="addplus('minus')"><i class="fas fa-minus"></i></span>
									</div>
									<input value="<?php echo $user['user_id'] ?>" name="userid" hidden>
									<input value="<?php echo $_GET['id'] ?>" name="item" hidden>
									<input type="number" min="0" max="<?php echo $pro['stock'] ?>" value="1" class="form-control" style="padding: 10px" name="qty">
									<div class="input-group-append">
										<span class="input-group-text" onclick="addplus('add')"><i class="fas fa-plus"></i></span>
									</div>
									<div class="input-group-append">
										<button class="input-cart" type="button" onclick="checkqty()"><strong>Add to Cart</strong></button>
									</div>
								</div>
							</form>
							<center>
								<p id="popup" style="display: none;">Added to cart</p>
							</center>
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
					$( "#myTopnav" ).load( window.location.href + " #myTopnav" );
					document.getElementById( 'popup' ).style.display = 'block';
					setTimeout( function () {
						document.getElementById( 'popup' ).style.display = 'none';
					}, 3000 );
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