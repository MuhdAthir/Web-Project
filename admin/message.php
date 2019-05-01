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
        <tr bgcolor="#cccccc">
          <th>Id</th>
          <th>User</th>
          <th>Contact</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Syafiq</td>
          <td>syafiqshuib@gmail.com</td>
          <td>Why is my item late?</td>
        </tr>
     </tbody>
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