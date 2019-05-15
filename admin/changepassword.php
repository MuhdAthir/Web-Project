<?php
  
  include('include/dbcon.php');
  include('include/session.php');

  if(isset($_POST['submit']))
  {
  $sql=mysqli_query($conn,"SELECT password FROM admin where password='".$_POST['pass']."' && username='".$_SESSION['login_user']."'");
  $num=mysqli_fetch_array($sql);
  if($num>0)
  {
   $con=mysqli_query($conn,"UPDATE admin SET password='".$_POST['newPass']."' WHERE username='".$_SESSION['login_user']."'");
  echo "<script>alert('Password Updated!'); window.location = 'dashboard.php';</script>";
  }
  else
  {
  echo "<script>alert('Old Password Not Match!'); window.location = 'changepassword.php';</script>";
  }
  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
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
          width: 40%;
          min-height: 25px;
          border-radius: 3px;
       }

       button:hover {
          opacity: 0.8;
       }

       form{
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
		<h1>Change Password</h1>
    <br><br>
    <div>
      <form action="" method="post" id="changeForm">
        <table table cellpadding="8">
          <tr>
            <td align="right">Current Password</td>
            <td><input type="text" id="pass" name="pass" placeholder="Enter current password"></td>
          </tr>
          <tr>
            <td align="right">New Password</td>
            <td><input type="text" id="newPass" name="newPass" placeholder="Enter new password"></td>
          </tr>
          <tr>
            <td align="right">Re-type New Password</td>
            <td width=""><input type="text" id="confirmPass" name="confirmPass" placeholder="Enter again new password"></td>
          </tr>
          <tr>
            <td>
              <button type="submit" name="submit" class="buttonAdd">Submit</button></a>
            </td>
          </tr>
        </table>
      </form>
    </div>
        
        
		

	</div>

	<script type="text/javascript">
		$(document).ready(function() {

        $(function(){
          $("#sidebar").load("include/sidebar.php"); 
        });

        $(function(){
          $("#header").load("include/header.php"); 
        });

         $("#changeForm").submit(function() {
           if ($("#pass").val() == "") {
             alert("Current Password is empty");
             return false;
          }
          if ($("#newPass").val() == "") {
             alert("New Password is empty");
             return false;
          }
          if ($("#confirmPass").val() == "") {
             alert("Confirm Password is empty");
             return false;
          }
          if ($("#newPass").val() != $("#confirmPass").val()) {
             alert("Password and Confirm Password Field do not match!");
             return false;
          }

       });
  });
	</script>

</body>
</html>