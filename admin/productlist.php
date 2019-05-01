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
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hexagon Mug</td>
                <td>Mug</td>
                <td align="center"><img src="assets/mug.png" width="50" height="50"></td>
                <td>RM 15</td>
                <td>Active</td>
                <td>
                    <a href="productedit.php"><button class="buttonEdit"><i class="far fa-edit"></i> Edit</button></a>
                    <button class="buttonDelete" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash-alt"></i> Delete</button>
                </td>
            </tr>
            <tr>
                <td>Pinky Totebag</td>
                <td>Totebag</td>
                <td align="center"><img src="assets/totebag.png" width="50" height="50"></td>
                <td>RM 30</td>
                <td>Active</td>
                <td>
                     <a href="productedit.php"><button class="buttonEdit"><i class="far fa-edit"></i> Edit</button></a>
                    <button class="buttonDelete" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash-alt"></i> Delete</button>
                </td>
            </tr>
            
            
        </tbody>
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