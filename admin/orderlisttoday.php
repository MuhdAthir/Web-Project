<!DOCTYPE html>
<html>
<head>
	<title>Order List</title>
  <link rel="icon" type="image/ico" href="assets/icon.png" />
  <script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
  <style type="text/css">
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
  </style>
</head>
<body>
    <div id="sidebar"></div>
    <div id="header"></div>

    <div class="content">
      <h1>Today's Order</h1>
      <br>
      <table border="1" style="width:100%" cellpadding="5">
        <thead align="left" >
            <tr bgcolor=" #cccccc">
                <th>#</th>
                <th> Name</th>
                <th width="50">Email /Contact no</th>
                <th>Shipping Address</th>
                <th>Product </th>
                <th>Qty </th>
                <th>Amount</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include('include/dbcon.php');
                $f1="00:00:00";
                $from=date('Y-m-d')." ".$f1;
                $t1="23:59:59";
                $to=date('Y-m-d')." ".$t1;
                $query=mysqli_query($conn,"SELECT users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,product.product_name as productname,orders.quantity as quantity,orders.orderDate as orderdate,product.price as productprice,orders.id as id  FROM orders JOIN users on  orders.user_id=users.user_id JOIN product on product.product_id=orders.product_id WHERE orders.orderDate Between '$from' and '$to'");
                $cnt=1;
                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {
                ?>          
            <tr>
                <td><?php echo ($cnt);?></td>
                <td><?php echo ($row['username']);?></td>
                <td><?php echo ($row['useremail']);?>/<?php echo ($row['usercontact']);?></td>
                <td><?php echo ($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']);?></td>
                <td><?php echo ($row['productname']);?></td>
                <td><?php echo ($row['quantity']);?></td>
                <td><?php echo ($row['quantity']*$row['productprice']);?></td>
                <td><?php echo ($row['orderdate']);?></td>
                <td><a href="updateorder.php?id=<?php echo $row["id"];?>"><button class="buttonEdit"><i class="far fa-edit"></i> Edit</button></a></td>
         </tr>

         <?php $cnt=$cnt+1; } ?>
     </tbody>
 </table>

</div>

<script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable();
  } );

  function changestat( statid, selectid )
  {
     var test = document.getElementsByClassName('status');
     test[statid].innerHTML = selectid.value;
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