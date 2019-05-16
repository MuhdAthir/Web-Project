<?php 
  
  include('include/dbcon.php');

  $product_id=$_GET['product_id'];

  $res=mysqli_query($conn,"SELECT * FROM product WHERE product_id='".$product_id."'");
  $row=mysqli_fetch_array($res);
  $image=$row['product_image'];
  unlink("productimages/".$image);

  $sql = "DELETE FROM product WHERE product_id = '".$product_id."' ";
  $query = mysqli_query($conn,$sql);

  if($query) {
    echo "<script type='text/javascript'>";
    echo 'window.location.href = "productlist.php";';
    echo '</script>';
  }
?> 