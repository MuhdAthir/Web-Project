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

    .topnav {
      overflow: hidden;
      background-color: #333;
      position: fixed;
      z-index: 5;
      width: 100%;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      /*padding: 14px 16px;*/
      text-decoration: none;
      font-size: 15px;

    }

    .topnav a:hover, .dropdown:hover .dropbtn {
      background-color: #555;
      color: white;

    }

    .dropdown {
      overflow: hidden;
      float: right; 

    }

    .dropdown .dropbtn {
      font-size: 17px;
      /*float : left;    */
      border: 0;
      outline: none;
      color: white;
      padding: 13px 10px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .dropdown-content {
      display: none;
      position: fixed;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      right: 0px;
      left: auto;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
      color: black;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-btn{
      padding: 16px;
      font-size: 16px;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
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

   
  </style>
</head>
<body>

  <div class="topnav" id="myTopnav">
    <a class="img" href='dashboard.php'><img src='assets/logo.png' style='width:260px; height: 43px'></a>
    <div class="dropdown">
      <button class="dropbtn">Welcome <?php echo $_SESSION['username'] ?> 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <!-- <a href="profile.php"><i class="far fa-edit"></i> Edit Profile</a> -->
        <a href="changepassword.php"><i class="fas fa-key"></i> Change Password</a>
        <a href="logout.php" onclick="return confirm('Are you sure to logout?');"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
  </div> 

  </div>

  
  <script>
   

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }

  </script>

</body>
</html>
