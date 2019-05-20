<?php
include( '../admin/include/dbcon.php' );
include( '../function.php' );

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
	header( "Location: ../index.php" );
};
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
<style>
	.footer {
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		background-color: #fff;
		background-clip: border-box;
		border: 2px solid rgba(0, 0, 0, .125);
		color: black;
		text-align: center;
	}
</style>

<body>
	<?php include('navbar.php') ?>

	<div class="container">
		<div align="center">
			<div class="card" style="width: 90%;" align="left">
				<div class="card-header"><strong>Your cart</strong>
				</div>
			</div><br>
			<form method="post" action="checkout.php">
			<?php
			$sql = "SELECT * FROM cart c, product p WHERE (c.user_id = '" . $user[ 'user_id' ] . "' AND c.status = 1)  AND p.product_id = c.product_id";
			$loopcart = loopSQL( $conn, $sql );
			while ( $row = $loopcart->fetch_assoc() ) {
				?>
			<input name="item[]" value="<?php echo $row['order_id'] ?>" hidden> 
			<div id="div_<?php echo $row['order_id'] ?>">
				<div class="card" style="width: 90%;" align="left">
					<div class="card-body">
						<div class="grid-container" style="grid-template-columns: 10% 35% 15% 18% 15% 5%">
							<div class="grid-item" style="padding: 14px">
								<img src="../admin/productimages/<?php echo $row['product_image'] ?>" alt="" class="img-pro card" style="height: 90px;">
							</div>
							<div class="grid-item" style="padding: 30px">
								<?php echo $row['product_name'] ?>
							</div>
							<div class="grid-item" style="padding: 30px">
								RM
								<?php echo $row['price'] ?>
							</div>
							<div class="grid-item" style="padding: 30px">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" onclick="addplus('minus','<?php echo $row['order_id'].'\',\''.$row['price'] ?>')"><i class="fas fa-minus"></i></span>
									</div>
									<input type="number" min="1" max="<?php echo $row['stock'] ?>" class="form-control" style="padding: 10px" id="qty_<?php echo $row['order_id'] ?>" value="<?php echo $row['qty'] ?>">
									<div class="input-group-append">
										<span class="input-group-text" onclick="addplus('add','<?php echo $row['order_id'].'\',\''.$row['price'] ?>')"><i class="fas fa-plus"></i></span>
									</div>
								</div>
							</div>
							<div class="grid-item" style="padding: 30px">
								RM
								<a class="total" id="ttl_<?php echo $row['order_id'] ?>">
									<?php echo number_format((float)$row['price']*$row['qty'], 2, '.', '') ?>
								</a>
							</div>
							<div class="grid-item" style="padding: 30px">
								<a style="font-size: 25pt" href="javascript: divDel('<?php echo $row['order_id'] ?>', '<?php echo $row['product_name'] ?>')"><i class="fas fa-trash"></i></a>
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="footer">
		<div class="grid-container" style="grid-template-columns: 65% 35%">
			<div class="grid-item" style="padding: 10px" align="right">
				<h2>Merchandise Subtotal: <a style="color: red">RM <a style="color: red" id="subtotal">0.00</a></a> </h2>
			</div>
			<div class="grid-item" style="padding: 15px" align="left">
				<button class="btn-secondary" style="width: 90%; border-radius: 0em 15px 15px 0em;" name="checkout"><strong>Check Out</strong></button>
				</form>
			</div>
		</div>
	</div>
	<script src="../js/all.js" type="text/javascript"></script>
	<script>
		$( document ).ready( function () {
			calcTotal();
		} );

		function addplus( what, id, unit ) {
			var getid = 'qty_' + id;
			var ttl = 'ttl_' + id;
			var qty = $( '#' + getid );
			var jpost = 'false';
			var nqty = 0;

			if ( qty.value != '' ) {
				if ( what == 'minus' ) {
					if ( qty.val() > 0 ) {
						nqty = qty.val( parseInt( qty.val() ) - 1 );
						jpost = 'true';
					}
				} else {
					if ( qty.val() < parseInt( qty.attr( "max" ) ) )
						nqty = qty.val( parseInt( qty.val() ) + 1 );
					jpost = 'true';
				}

			} else {
				qty.value = 0;
			}

			if ( jpost == 'true' ) {
				var q = nqty.val();
				$.post( "../jquery_post.php", //Required URL of the page on server
					{ // Data Sending With Request To Server
						qtyid: id,
						newqty: q
					},
					function ( response ) { // Required Callback Function
						var kiraan = q * unit;
						$( '#' + ttl ).text( kiraan.toFixed( 2 ) );
						calcTotal();
					} );
			}
		}

		function calcTotal() {
			var total = 0;
			$( '.total' ).each( function ( i, obj ) {
				total = total + parseFloat( $( this ).text() );
			} );
			$( '#subtotal' ).text( total.toFixed( 2 ) );
		}

		function divDel( id, name ) {
			var div = 'div_' + id;
			var c = confirm( 'Remove ' + name + ' from cart?' );
			if ( c == true ) {
				$.post( "../jquery_post.php", //Required URL of the page on server
					{ // Data Sending With Request To Server
						delitem: id
					},
					function ( response ) { // Required Callback Function
						$( "#myTopnav" ).load( window.location.href + " #myTopnav" );
						$( '#' + div ).remove();
					} );
			}
		}
	</script>
</body>
</html>