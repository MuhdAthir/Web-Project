<?php 

  include('include/dbcon.php');

  $order_id = $_GET['id'];

  if(isset($_POST['submit']))
  {
    
    $status=$_POST['status'];
    $sql=mysqli_query($conn,"UPDATE orders SET orderStatus='$status' WHERE id='$order_id' ");

    echo "<script>alert('Order Update!'); window.location = 'orderlist.php';</script>";

  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
  <link rel="icon" type="image/ico" href="assets/icon.png" />
  <script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
  <style type="text/css">

    body{
      background-color: #f2f2f2;
    }

    .buttonAdd{
          background-color: #5cb85c;
          color: white;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          min-height: 25px;
          border-radius: 3px;
       }

    button:hover {
      opacity: 0.8;
    }

    form{
      display: table;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
      padding: 20px;
      width: 40%;
    }

    input, select, label{
      /*margin-left: 15px*/
      display: table-cell;
    }

    p{
      display: table-row;
    }

  </style>
</head>
<body>
  <div id="sidebar"></div>
  <div id="header"></div>

  <div class="content">
    <h1>Edit Product</h1>
    <br>
    <div style="text-align: left;">
      <a href="orderlist.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
    </div>
    <br>
    <div>

      <?php  

        if(isset($_GET["id"]))
       {
         $order_id = $_GET["id"];
       }

       $sql = "SELECT * FROM orders WHERE id = '".$order_id."' ";

       $query = mysqli_query($conn,$sql);

       $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
     ?>

      <form action="" id="productForm" name="insertproduct" method="post" >
        <p>
          <label>Order Id</label>
          <input type="text" name="id"  value="<?php echo $result['id'];?>" disabled>
        </p><br>
        <p>
          <label>Order Date</label>
          <input type="text" disabled name="order_date" placeholder="Enter Category Name" value="<?php echo $result['orderDate'];?>">
          </p><br>
          <p>
            <label>Status</label>
            <select name="status">
              <option value="">Select Status</option>
              <option value="Delivered">Delivered</option>
              <option value="In Progress">In Progress</option>
            </select>
          </p><br>

          <button type="submit" name="submit" class="buttonAdd">Update</button></a>
        </form>
      </div>




    </div>

    <script type="text/javascript">

      $(function(){
        $("#sidebar").load("include/sidebar.php"); 
      });

      $(function(){
        $("#header").load("include/header.php"); 
      });
    </script>

  </body>
  </html>