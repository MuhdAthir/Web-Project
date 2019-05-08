<?php 

  include('include/dbcon.php');

  $product_id = $_GET['product_id'];

  if(isset($_POST['submit']))
  {
    
    // $productname=$_POST['product_name'];
    // $category=$_POST['category'];
    // $productprice=$_POST['price'];
    // $productAvailability=$_POST['productAvailability'];
    
    $sql=mysqli_query($conn,"update  product set product_name='".$_POST["product_name"]."' ,product_category='".$_POST["category"]."' ,price='".$_POST["price"]."' ,product_status='".$_POST["productAvailability"]."'  where product_id='$product_id' ");

    echo "<script>alert('Product Update!.'); window.location = 'productlist.php';</script>";

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
      width: 35%;
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
      <a href="productlist.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
    </div>
    <br>
    <div>

      <?php  

        if(isset($_GET["product_id"]))
       {
         $product_id = $_GET["product_id"];
       }

       $sql = "SELECT * FROM product WHERE product_id = '".$product_id."' ";

       $query = mysqli_query($conn,$sql);

       $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
     ?>

      <form action="" id="productForm" name="insertproduct" method="post" enctype="multipart/form-data">
        <p>
          <label>Product Name</label>
          <input type="text" name="product_name" placeholder="Enter Category Name" value="<?php echo $result['product_name'];?>">
        </p><br>
        <p>
          <label>Product Category</label>
          <select name="category">
            <option value="<?php echo $result['product_category'];?>"><?php echo $result['product_category'];?></option> 
            <?php 
            include('include/dbcon.php');
            $query=mysqli_query($conn,"select * from category");
            while($row=mysqli_fetch_array($query))
              {
                  if($result['product_category']==$row['cat_name'])
                  {
                    continue;
                  }
                  else{
                  ?>
                <option value="<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></option>
              <?php }} ?>
            </select>
          </p><br>
          <p>
            <label>Image</label>
            <img src="productimages/<?php echo $product_id;?>/<?php echo $result['product_image'];?>" width="100" height="100"> <a href="update-image.php?product_id=<?php echo $result['product_id'];?>">Change Image</a>
          </p><br>
          <p>
            <label>Product Price</label>
            RM <input type="text" name="price" placeholder="Enter Category Price" value="<?php echo $result['price'];?>">
          </p><br>
          <p>
            <label>Status</label>
            <select name="productAvailability"  id="productAvailability">
              <option value="<?php echo $result['product_status'];?>"><?php echo $result['product_status'];?></option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
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