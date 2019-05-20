<?php 
  
  include('include/dbcon.php');
  include('include/session.php');
  
  if(isset($_POST['submit']))
  {
    $productname=$_POST['product_name'];
    $category=$_POST['category'];
    $productimage=$_FILES["productimage"]["name"];
    $productprice=$_POST['price'];
    $productstock=$_POST['stock'];
    $productAvailability=$_POST['productAvailability'];

    $target = "productimages/".basename($productimage);
    
    if (file_exists($target)){
      echo "<script>alert('Duplicate Image!'); window.location = 'productlist.php';</script>";
    }else{
      $sql=mysqli_query($conn,"insert into product(product_name, product_category, product_image, price, stock, product_status) values('$productname','$category','$productimage','$productprice','$productstock','$productAvailability')");
    

      if(move_uploaded_file($_FILES['productimage']['tmp_name'],$target)){
         echo "<script>alert('Product Add!'); window.location = 'productlist.php';</script>";
      }else{
         echo "<script>alert('Failed Add!'); window.location = 'productlist.php';</script>";
      }
      
    }

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
          <input type="text" id="productName" name="product_name" placeholder="Enter Product Name">
        </p><br>
        <p>
          <label>Product Category</label>
          <select name="category" >
            <!-- <option value="">Select Category</option> -->
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
          <input type="file" name="productimage" id="productImage" value="" accept="png,jpeg,jpg">
        </p><br>
        <p>
          <label>Product Price</label>
           <input type="number" id="productPrice" name="price" placeholder="RM">
        </p><br>
        <p>
          <label>Stock</label>
          <input type="number" id="productStock" name="stock" placeholder="Enter Stock">
        </p><br>
        <p>
          <label>Status</label>
          <select name="productAvailability"  id="productAvailability">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </p><br>

        <p>
          <label></label>
          <button style="float: right;" type="submit" name="submit" class="buttonAdd">Add Product</button>

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

        $("#productForm").submit(function() {

             if ($("#productName").val() == "") {
               alert("Product Name is missing");
               return false;
            }
            if ($("#productPrice").val() == "") {
               alert("Product Price Field is missing");
               return false;
            }
            if ($("#productStock").val() == "") {
               alert("Product Stock Field is missing");
               return false;
            }
            if ($("#productImage").val() == "") {
               alert("Product Image Field is missing");
               return false;
            }
            

         });
  </script>

</body>
</html>