<?php 
  
  include('include/dbcon.php');
  
  if(isset($_POST['submit']))
  {
    $productname=$_POST['product_name'];
    $category=$_POST['category'];
    $productimage=$_FILES["productimage"]["name"];
    $productprice=$_POST['price'];
    $productAvailability=$_POST['productAvailability'];


    //for getting product id
    $query=mysqli_query($conn,"select max(product_id) as pid from product");
    $result=mysqli_fetch_array($query);
    $productid=$result['pid']+1;
    $dir="productimages/$productid";
    mkdir($dir);// directory creation for product images
    move_uploaded_file($_FILES["productimage"]["tmp_name"],"productimages/$productid/".$_FILES["productimage"]["name"]);

    $sql=mysqli_query($conn,"insert into product(product_name, product_category, product_image, price, product_status) values('$productname','$category','$productimage','$productprice', '$productAvailability')");

    echo "<script>alert('Product Add!.'); window.location = 'productlist.php';</script>";

  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
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
    <h1>Add Product</h1>
    <br>
    <div style="text-align: left;">
      <a href="productlist.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
    </div>
    <br>
    <div>
      <form action="" id="productForm" name="insertproduct" method="post" enctype="multipart/form-data">
        <p>
          <label>Product Name</label>
          <input type="text" name="product_name" placeholder="Enter Category Name">
        </p><br>
        <p>
          <label>Product Category</label>
          <select name="category">
            <option value="">Select Category</option>
            <?php 
            include('include/dbcon.php');
            $query=mysqli_query($conn,"select * from category");
            while($row=mysqli_fetch_array($query))
            {?>
            <option value="<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></option>
            <?php } ?>
          </select>
        </p><br>
         <p>
          <label>Image</label>
          <input type="file" name="productimage" id="productimage" value="">
        </p><br>
        <p>
          <label>Product Price</label>
          RM <input type="text" name="price" placeholder="Enter Category Price">
        </p><br>
        <p>
          <label>Status</label>
          <select name="productAvailability"  id="productAvailability">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </p><br>
        
        <button type="submit" name="submit" class="buttonAdd">Insert</button></a>
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

        $("#productForm").submit(function() {

             if ($("#category_name").val() == "") {
               alert("Category Name Field is missing");
               return false;
            }
         });
  </script>

</body>
</html>