<?php 

  include('include/dbcon.php');
  include('include/session.php');

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
          width: 30%;
          min-height: 25px;
          border-radius: 3px;
          font-size: 15px
       }

       button:hover {
          opacity: 0.8;
       }

       form{
        display: table;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
        padding: 20px;
        width: 50%;
       }

       input, select, label, button{
        display: table-cell;
       }

       p{
        display: table-row;
       }

       input {
         width: 100%;
         padding: 12px 20px;
         margin: 4px 0;
         display: inline-block;
         border: 1px solid #ccc;
         box-sizing: border-box;
       }

  </style>
</head>
<body>
  <div id="sidebar"></div>
  <div id="header"></div>

  <div class="content">
    <h1>Update Order</h1>
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

       $sql = "SELECT id,DATE_FORMAT(orderDate, '%d/%m/%Y %H:%i') FROM orders WHERE id = '".$order_id."' ";

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
          <input type="text" disabled name="order_date" placeholder="Enter Category Name" value="<?php echo $result["DATE_FORMAT(orderDate, '%d/%m/%Y %H:%i')"];?>">
          </p><br>
          <p>
            <label>Status</label>
            <select name="status">
              <option value="">Select Status</option>
              <option value="Delivered">Delivered</option>
              <option value="In Progress">In Progress</option>
            </select>
          </p><br>
          <p>
            <label></label>
            <button style="float: right" type="submit" name="submit" class="buttonAdd">Update</button>
          </p>
          
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