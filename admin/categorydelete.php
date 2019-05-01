<?php 
  
  include('include/dbcon.php');

  $cat_id=$_GET['cat_id'];

  $sql = "DELETE FROM category 
          WHERE cat_id = '".$cat_id."' ";

  $query = mysqli_query($conn,$sql);

  if($query) {
    echo "<script type='text/javascript'>";
    // echo 'alert("Record Delete!");';
    echo 'window.location.href = "category.php";';
    echo '</script>';
  }
?> 