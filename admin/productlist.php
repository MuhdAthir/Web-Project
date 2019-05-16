<?php
    include('include/session.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
  <link rel="icon" type="image/ico" href="assets/icon.png" />
  <script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
  <style type="text/css">

    .buttonAdd{
      background-color: #5cb85c;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: auto;
      min-height: 25px;
      border-radius: 2px;
    }
    .buttonEdit{
      background-color: #337ab7;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: auto;
      min-height: 25px;
      border-radius: 2px;
    }
    .buttonDelete{
      background-color: #d9534f;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: auto;
      min-height: 25px;
      border-radius: 2px;
    }

    button:hover {
      opacity: 0.8;
    }

  </style>
</head>
<body>
  <div id="sidebar"></div>
  <div id="header"></div>



  <div class="content">
    <h1>Product List</h1>
    <div style="text-align: right;">
      <a href="productadd.php"><button class="buttonAdd"><i class="fas fa-plus"></i> Add New</button></a>
    </div>

    <table border="1" style="width:100%" cellpadding="5">
      <thead align="left" >
        <tr bgcolor=" #cccccc">
          <th>Product Name</th>
          <th>Category</th>
          <th align="center">Image</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      
      include('include/dbcon.php');

      $sql = "SELECT * FROM product";

      $query = mysqli_query($conn,$sql);

      while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
      {
        ?>
        <tbody>
          <tr>
            <td><?php echo $result["product_name"];?></td>
            <td><?php echo $result["product_category"];?></td>
            <td align="center"><img src="productimages/<?php echo $result["product_image"];?>" width="50" height="50"></td>
            <td>RM <?php echo $result["price"];?></td>
            <td><?php echo $result["stock"];?></td>
            <td><?php echo $result["product_status"];?></td>
            <td>
              <a href="productedit.php?product_id=<?php echo $result["product_id"];?>"><button class="buttonEdit"><i class="far fa-edit"></i> Edit</button></a>

              <a href="productdelete.php?product_id=<?php echo $result['product_id'];?>" onClick="return confirm('Are you sure you want to delete?')"><button class="buttonDelete"><i class="fas fa-trash-alt"></i> Delete</button></a
              </td>
            </tr>
          </tbody>
          <?php
        }
        ?>
      </table>

    </div>

    <script type="text/javascript">

      function changestat( statid, selectid )
      {
        var test = document.getElementsByClassName('status');
        test[statid].inne.php = selectid.value;
      }

      $(function(){
        $("#sidebar").load("include/sidebar.php"); 
      });

      $(function(){
        $("#header").load("include/header.php"); 
      });
    </script>

  </body>
  </html>