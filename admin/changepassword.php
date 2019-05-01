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
		<h1>Change Password</h1>
    <br><br>
    <div>
      <form action="dashboard.php">
        <table table cellpadding="8">
          <tr>
            <td align="right">Current Password</td>
            <td><input type="text" name="" placeholder="Enter current password"></td>
          </tr>
          <tr>
            <td align="right">New Password</td>
            <td><input type="text" name="" placeholder="Enter new password"></td>
          </tr>
          <tr>
            <td align="right">Re-type New Password</td>
            <td width=""><input type="text" name="" placeholder="Enter again new password"></td>
          </tr>
          <tr>
            <td>
              <button class="buttonAdd">Submit</button></a>
            </td>
          </tr>
        </table>
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
	</script>

</body>
</html>