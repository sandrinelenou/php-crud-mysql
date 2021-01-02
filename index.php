<!doctype html>
 <?php include('db.php'); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
   

    <title>Server side Ajax</title>
   
  </head>
  <body>

    <div class="content py-5">
    <h1 class= "text-center pb-5">Server Side Ajax CRUD data (PHP, MySql, Bootstrap Modal, Javascripts)</h1>
    
<table id="product_table" class="table  table-striped">   
    <?php 

		$sql= "SELECT* FROM products";
	
	$result= mysqli_query($conn, $sql);    //vado a eseguire la query e salvo dentro result
  
    if($result){    //if(mysqli_num_rows($result) > 0) ci da il numero di righe andiamo a vedere se ci sono record dentro $result con mysqli_num_rows()>0 quando non e vuota
      
      echo '
            <thead bgcolor="#6cd8dc">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
				';
      foreach($result as $row){   //while($rows= mysqli_fetch_array($result)) recupera il resultato della query e salva dentro un array chiamato rows[]
        
        echo ' <tbody>';
        echo "<tr>";
          echo "<td>".$row['id']."</td>";
          echo "<td>".$row["name"]."</td>";
          echo "<td>€".$row['price']."</td>";
          echo '<td><button id="editproduct" data-bs-modal= "modal" data-bs-target="#editModal" href="index.php?aggiorna-pdt.php&id='.$row['id'].'" class="btn btn-success">Edit</button></td>';
          echo '<td><a  href="update_dati&id='.$row['id'].'" >Edit</a></td>';
          echo '<td><button id="deleteproduct" class="btn btn-danger">Delete</button></td>';
        echo "</tr>";
        echo "</tbody>";
      }//fin while
          
    }else{
      echo "no product o record found";
    }

  ?> 
  
</table>

<!-- Button trigger modal -->
<div align="right">
  <button  type="button" id="add_button2" data-bs-toggle="modal" data-bs-target="#addModal"  
  class="btn btn-success">Add Product</button>

  <button  type="button" id="addProduct2" class="btn btn-success"><span class="material-icons">
add_to_queue</span></button>
</div>

<!-- Edit modal -->
<div id="editModal" class="modal fade" >
  <div class="modal-dialog">
    <form method="post" id="product_form" enctype="multipart/form-data">
     <div class="modal-content">
        <div class="modal-header">
              
          <h4 align="left"  class="modal-title"> Edit Product</h4>
          <button  type="button" class="close" align="right" data-bs-dismiss="modal">&times;</button> <!--alternative per chiudere-->

        </div>
        <div class="modal-body">
          <p class="message_error"></p>
          <label> Enter Product Name</label>
          <input type="text" name="product" id="product" class="form-control"><br>
          <label> Enter Price</label>
          <input type="text" name="price" id="price" class="form-control"><br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="product_id" id="product_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="Add" id="action"  class="btn btn-primary">
          <button type="submit" class="btn btn-success" name="Add"  >Save</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
       
     </div>
    </form>
  </div>


    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" i></script>
   
  </body>
  
</html>

<!-- Enter modal pop up-->

<div id="addModal" class="modal fade" >
  <div class="modal-dialog">
    <form method="post" id="product_form" action= "fetch.php" enctype="multipart/form-data">
     <div class="modal-content">
        <div class="modal-header">
          <h4 align="left"  class="modal-title"> Add Product</h4>
          <button  type="button" class="close" align="right" data-bs-dismiss="modal">&times;</button> 
        </div>
        <div class="modal-body">
          <label> Enter Product Name</label>
          <input type="text" name="product" id="name" class="form-control"><br>
          <label> Enter Price</label>
          <input type="text" name="price" id="price" class="form-control"><br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="product_id" id="product_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="Add" id="action" value="Add" class="btn btn-primary">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
       
     </div>
    </form>
  </div>



</div>



