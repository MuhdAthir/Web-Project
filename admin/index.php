<?php
include("include/dbcon.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $password = mysqli_real_escape_string($conn,$_POST['password']); 

   $sql = "SELECT id FROM admin WHERE username = '$username' and password = '$password'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];

   $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

   if($count == 1) {

      $_SESSION['username'] = $username;
      header("location: dashboard.php");
   }else {
      $error = "Your Login Name or Password is invalid";
      echo "<script type='text/javascript'>alert('$error');</script>";
   }
}
?>

<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Crafted by Soul</title>
   <link rel="icon" type="image/ico" href="assets/icon.png" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
   
   <style type="text/css">
      .login-form {
       width: 340px;
       margin: 50px auto;
    }

    .login-form form {
       background: #f7f7f7;
       box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
       border-width: 2px;
       padding: 30px;
    }

    .login-form h2 {
       margin: 0 0 15px;
    }

    .form-control,
    .btn {
       min-height: 38px;
       border-radius: 2px;
    }

    .btn {
       font-size: 15px;
       font-weight: bold;
    }

    .container{
      padding: 16px;
    }

   body{
      background-image: url("assets/bg2.jpg");
      background-repeat: no-repeat;
      background-size:cover;
      font-family: arial;

   }

   button{
      background-color: #FF69B4;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
   }

   button:hover {
      opacity: 0.8;
   }

   input[type=text], input[type=password] {
     width: 100%;
     padding: 12px 20px;
     margin: 4px 0;
     display: inline-block;
     border: 1px solid #ccc;
     box-sizing: border-box;
   }

   .text-center{
      text-align: center;
   }

   .cbs{
      font-size: 30px; 
      color: #FF69B4; 
      font-weight: bold;
      text-align: center;
   }

    </style>

 </head>
 <body>
   <div class="login-form test">
      <form action="" method="post" id="loginForm">
        <div style="text-align: center">
          <img class="mb-4" src="assets/icon.png" alt="" width="100" height="100">
       </div><br>
         <div class="text-center" style="font-family: arial">Welcome to</div>
         <div class="cbs">Crafted by Soul</div><br>
         <input type="text" name="username" id="username" placeholder="Enter Id">
         <input type="password" name="password" id="password" placeholder="Enter Password"><br>
         <button type="submit" class="btn">Sign in</button>
         <!-- <a href="dashboard.php"><button class="btn">Sign in</button></a>  -->
      </form>
   </div>

</body>
<script type="text/javascript" charset="utf-8">
 $(document).ready(function() {

   $('.test').slideDown(700);

   $("#loginForm").submit(function() {

     if ($("#username").val() == "") {
       alert("Username Field is empty");
       return false;
    }
    if ($("#password").val() == "") {
       alert("Password Field is empty");
       return false;
    }
 });

});
</script>
</html>