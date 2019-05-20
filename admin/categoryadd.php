<?php
  include('include/dbcon.php');
  include('include/session.php');

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
		<h1>Add Category</h1>
    <br>
    <div style="text-align: left;">
      <a href="category.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
    </div>
    <br>
    <div>
      <form action="" method="post" id="catForm">
        <p>
          <label>Category Name</label>
          <input type="text" name="cat" id="category_name" placeholder="Enter Category Name"><br><br>
        </p>
         <p>
           <label></label>
           <button style="float: right" type="submit" name="saveCat" class="buttonAdd">Create</button></a>
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


         $("#catForm").submit(function() {

             if ($("#category_name").val() == "") {
               alert("Category Name Field is missing");
               return false;
            }
         });

	</script>

</body>
</html>