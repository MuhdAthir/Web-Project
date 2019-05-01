<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
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
          width: 35%;
          min-height: 25px;
          border-radius: 3px;
       }

       button:hover {
          opacity: 0.8;
       }

       form{
        display: table;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .26);
        padding: 20px;
        width: 40%;
       }

       input, select, label{
        /*margin-left: 15px*/
        display: table-cell;
       }

       p{
        display: table-row;
       }

   </style>
</head>
<body>
  <div id="sidebar"></div>
  <div id="header"></div>

  <div class="content">
    <h1>Edit Product</h1>
    <br><br>
    <div>
      <form action="productlist.php">
        <p>
          <label>Product Name</label>
          <input type="text" name="cat" placeholder="Enter Category Name">
        </p><br>
        <p>
          <label>Product Category</label>
          <select>
            <option value="volvo">Mug</option>
            <option value="saab">Totebag</option>
          </select>
        </p><br>
         <p>
          <label>Image</label>
          <input type="file" name="myFile">
        </p><br>
        <p>
          <label>Status</label>
          <select>
            <option value="volvo">Active</option>
            <option value="saab">Not Active</option>
          </select>
        </p><br>
        
        <button class="buttonAdd">Edit</button></a>
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