<?php

include('admin/include/dbcon.php');
include('function.php');

$getproduct = loopSQL($conn, "SELECT * FROM cart c, product p WHERE  c.status = 2  AND p.product_id = c.product_id GROUP BY c.product_id ORDER BY c.qty DESC");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crafted by Soul</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/all.css">
<script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
</head>
<body id="home">
<iframe src="fancy-slider/" height="300px" width="100%" frameborder="0"></iframe>
<?php include('navbar.php') ?>
  <div align="center" id="product">
	<br>
    <div class="card" style="width: 80%;" align="left">
      <div class="grid-container">
		 <?php while($row = $getproduct->fetch_assoc())
			{ ?>
		 <div class="grid-item">
          <div class="row">
            <div class="col-6"> <img src="admin/productimages/<?php echo $row['product_image'] ?>" class="img-pro card"> </div>
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
                  <td>Pending</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
		 <?php } ?>
      </div>
    </div>
  </div>
<script src="js/all.js" type="text/javascript"></script>
</body>
</html>