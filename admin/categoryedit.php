<?php 
  
  include('include/dbcon.php');
  include('include/session.php');
 
  if(isset($_POST['submit']))
  {
    $cat_id=$_GET['cat_id'];
    $sql = "UPDATE category 
          SET cat_name = '".$_POST["catname"]."' 
          WHERE cat_id = '".$_POST["catid"]."' ";

  $query = mysqli_query($conn,$sql);

  if($query) {
    echo "<script type='text/javascript'>";
    echo 'alert("Record Update!");';
    echo 'window.location.href = "category.php";';
    echo '</script>';
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
		<h1>Edit Category</h1>
    <br>
    <div style="text-align: left;">
      <a href="category.php"><i class="fas fa-arrow-circle-left fa-lg"></i></a> 
    </div>
    <br>
    <div>
      <?php  

        if(isset($_GET["cat_id"]))
       {
         $cat_id = $_GET["cat_id"];
       }

       $sql = "SELECT * FROM category WHERE cat_id = '".$cat_id."' ";

       $query = mysqli_query($conn,$sql);

       $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
     ?>
      <form action="" method="post" id="catForm">
        <p>
          <label>Category Name</label>
          <input id="category_name" type="text" name="catname" value="<?php echo $result["cat_name"];?>" placeholder="Enter Category Name"><br><br>
        <input type="hidden" name="catid" value="<?php echo $result["cat_id"];?>" placeholder="Enter Category Name">
        </p>
        <p>
          <label></label>
          <button style="float: right;" class="buttonAdd" type="submit" name="submit">Update</button>
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