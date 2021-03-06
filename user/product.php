<?php
include('../admin/include/dbcon.php');
include('../function.php');

session_start();
if ( !isset( $_SESSION[ "email" ] ) ) {
header( "Location: ../index.php" );
};

$getproduct = loopTable($conn, "product");

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
    <div class="card shadow" style="width: 80%;" align="left; box-shadow: 5px 10px #888888;">
      <div class="grid-container">
		 <?php while($row = $getproduct->fetch_assoc())
			{ ?>
		 <a href="viewproduct.php?id=<?php echo $row['product_id'] ?>">
		 <div class="grid-item">
          <div class="row">
            <div class="col-6"> <img src="../admin/productimages/<?php echo $row['product_image'] ?>" class="img-pro card"> </div>
            <div class="col-6">
              <table class="table">
                <tr>
                  <td colspan="2"><?php echo $row['product_name'] ?></td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td>RM <?php echo $row['price'] ?></td>
                </tr>
                <tr>
                  <td>Stock</td>
                  <td><?php echo $row['stock'] ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
		</a>
		 <?php } ?>
      </div>
    </div>
  </div>
</div>
<script src="../js/all.js" type="text/javascript"></script>
</body>
</html>