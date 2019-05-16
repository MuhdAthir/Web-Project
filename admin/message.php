<?php
  include('include/session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
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
    <h1>Message</h1>

    <table border="1" style="width:100%" cellpadding="2">
      <thead align="left">
      <col width="15%"> 
      <col width="15%">
      <col width="20%"> 
        <tr bgcolor="#cccccc">
          <th>Date/Time</th>
          <th>User</th>
          <th>Contact</th>
          <th>Message</th>
        </tr>
      </thead>
      <?php 
      
        include('include/dbcon.php');

        $sql = "SELECT DATE_FORMAT(date, '%d/%m/%Y %H:%i'), customer, contact, message FROM message";

        $query = mysqli_query($conn,$sql);
  
        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
        {
      ?>
      <tbody>
        <tr>
          <td><?php echo $result["DATE_FORMAT(date, '%d/%m/%Y %H:%i')"];?></td>
          <td><?php echo $result["customer"];?></td>
          <td><?php echo $result["contact"];?></td>
          <td><?php echo $result["message"];?></td>
        </tr>
     </tbody>
     <?php
      }
    ?>
   </table>

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