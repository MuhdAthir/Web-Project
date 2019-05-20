<?php
   include('session.php');
   include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    
    .sidebar {
      margin-top: 45px;
      padding: 0;
      width: 200px;
      background-color: #ffd1d5;
      position: fixed;
      height: 100%;
      overflow: auto;
    }
    
    .sidebar .icon {
      display: none;
    }

    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }

    

    .sidebar a:hover:not(.active), .dropdown-btn:hover {
      background-color: #555;
      color: white;
    }

    div.content {
      margin-left: 210px;
      padding: 1px 16px;
      padding-top: 50px;
      /*height: 1000px;*/
    }

    .dropdown-container {
      display: none;
      background-color: #fbdadd;
      /*padding-left: 10px;*/
    }

    @media screen and (max-width: 400px) {
      
      div.content {margin-left: 0;}

    }

    @media screen and (max-width: 395) {
    
    
    

  </style>
</head>
<body>


  <div class="sidebar" id="mySidenav">
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <button class="dropdown-btn"><i class="far fa-list-alt"></i> Order <i class="fas fa-caret-down"></i></button>
    <div class="dropdown-container">
      <a href="orderlisttoday.php">Today's Orders</a>
      <hr>
      <a href="orderlist.php">Pending Orders</a>
      <hr>
      <a href="deliveredorder.php">Delivered Orders</a>
    </div>
    <button class="dropdown-btn"><i class="fas fa-box"></i> Product <i class="fas fa-caret-down"></i></button>
    <div class="dropdown-container">
    <a href="category.php">Category</a>
    <hr>
    <a href="productlist.php">Product List</a>
  </div>
    
    <a href="message.php"><i class="fas fa-envelope"></i> Message</a>
    <a href="report.php"><i class="fas fa-chart-line"></i> Report</a>
    
  </div>


  <script>
    function myFunction() {
      var x = document.getElementById("mySidenav");
      if (x.className === "sidebar") {
        x.className += " responsive";
      } else {
        x.className = "sidebar";
      }
    }

  </script>

</body>
</html>
