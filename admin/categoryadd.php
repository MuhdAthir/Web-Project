<?php
  include('include/dbcon.php');

  if(isset($_POST['saveCat']))
  {
    $sql = "INSERT INTO category (cat_name) 
      VALUES ('".$_POST["cat"]."')";

    $query = mysqli_query($conn,$sql);

    if($query) {
      echo "<script>alert('Category Add!'); window.location = 'category.php';</script>";
    }

  }    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
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
          width: 15%;
          min-height: 25px;
          border-radius: 3px;
       }

       button:hover {
          opacity: 0.8;
       }

       form{
        /*border-style: solid;
        border-width: 1px;*/
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
        padding: 20px;
        width: 40%;
       }

       input{
        margin-left: 15px
       }

	 </style>
</head>
<body>
  <div id="sidebar"></div>
  <div id="header"></div>

	<div class="content">
		<h1>Add Category</h1>
    <br>
    <div style="text-align: left;">
      <a href="category.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
    </div>
    <br>
    <div>
      <form action="" method="post" id="catForm">
        Category Name <input type="text" name="cat" id="category_name" placeholder="Enter Category Name"><br><br>
        <button type="submit" name="saveCat" class="buttonAdd">Create</button></a>
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


         $("#catForm").submit(function() {

             if ($("#category_name").val() == "") {
               alert("Category Name Field is missing");
               return false;
            }
         });

	</script>

</body>
</html>