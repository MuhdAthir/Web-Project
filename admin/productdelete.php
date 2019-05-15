<?php 
  
  include('include/dbcon.php');

  $product_id=$_GET['product_id'];

  $sql = "DELETE FROM product 
          WHERE product_id = '".$product_id."' ";

  $query = mysqli_query($conn,$sql);

  if($query) {
    echo "<script type='text/javascript'>";
    // echo 'alert("Record Delete!");';
    echo 'window.location.href = "productlist.php";';
    echo '</script>';
  }
?> 