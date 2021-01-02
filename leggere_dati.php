<?php
session_start();
 
 include('db.php');


  //CREARE nuovi dati in tabella
  $user = "";
  $pass = "";
if(isset($_POST['save'])){ // name="submit" controlla se la variabile è stata definita
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query= "INSERT INTO utenti (username, password) VALUES('$user', '$pass')";
    $result = mysqli_query($conn, $query);


    $_SESSION['messsage'] = "record has been saved!";
    $_SESSION['msg_type'] = "success";

    if($result){
        //foreach($row as $result){
            echo ($_SESSION['messsage']) ;
        
    }else{
        echo("errore".mysqli_error($conn));
    }
}
 
//LEGGERE dati in tabella

$query= "SELECT * FROM utenti";
$result = mysqli_query($conn, $query);
if(!$result){
     echo("errore".mysqli_error($conn));
}

//DELETE dati in tabella

if(isset($_GET['delete'])){

    $id =$_GET['delete'];
    $sql = "DELETE FROM utenti WHERE id_utente = $id ";
    $result3 = mysqli_query($conn, $sql);
    if($result3){
        echo '<div class="alert alert-success">record has been deleted!</div>';
       // echo "<script>alert('record has been deleted!')</script>";
    }else{ echo "not";}
   // $conn->query("DELETE FROM utenti WHERE id_utente = $id ");
    
    $_SESSION['messsage'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("Location: leggere_dati.php");
}


//UPDATE dati in tabella
if(isset($_GET['edit'])){
    $id =$_GET['id'];
    
    //$result = $mysqli->query("SELECT * FROM utenti WHERE id_utente = $id") or die ($mysqli->error());
    $query = "SELECT * FROM utenti WHERE id_utente = {$_GET['id']} ";
    $result4 = mysqli_query($conn, $query);
    foreach($result4 as $row){
        
        $name = $row['username'];
        $pass = $row['password'];
    }
    $_SESSION['messsage'] = "record has been updated!";
    $_SESSION['msg_type'] = "info";


    if(isset($_POST['update'])){

        //$id = $_POST['id_utente'];
        $name2 = $_POST['username'];
        $pass2 = $_POST['password'];
        
        $query = "UPDATE utenti SET username = '$name2', password = '$pass2' WHERE id_utente = $id2";
        $result3 = mysqli_query($conn,$query);
        if($result3){
            echo '<div class="alert alert-success">Insert success</div>';
        }
    }
    header("Location: leggere_dati.php");
}

mysqli_close($conn);

?>


<!doctype html>
 
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
   

    <title>Leggere i Dati con PHP</title>
   
  </head>
  <body>


    <!--display ALERT message-->
    <?php   
     if(isset($_SESSION['message'])):    ?>
    <div class="alert alert-info alert-<?= $_SESSION['msg_type']?>">
       <?php 
        echo $_SESSION['message'];
        unset ($_SESSION['message']); 
       ?> 
    </div>
    <?php endif ?>
    <div class="content py-5">
    <h2 class="bg-success text-center mb-5">Leggere i dati</h2>

        <div class="">
        <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th colspan="2">ACTION</th>
                 </tr>
                </thead>
            <?php
            
                //while($dati = mysqli_fetch_assoc($result)){  //foreach($result as $row), while($dati = mysqli_fetch_array, print_r($dati); while($dati = mysqli_fetch_row
               foreach($result as $row){
                ?>
                 <!--<pre><?php //print_r($row); ?></pre>-->
                <tbody>
                    <tr>
                    <th ><?php echo $row['id_utente']; ?></th>
                    <td><?= $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><button type="" class="btn btn-info"><a href="leggere_dati.php?edit=<?php echo $row['id_utente']; ?>">Edit</a></button></td>
                    <td><button type="" class="btn btn-danger"><a href="leggere_dati.php?delete=<?php echo $row['id_utente']; ?>">Delete</a></button></td>
                   </tr>
                    
                </tbody>
                    

                <?php } 
             ?>
            </table>

            <button type="" class="btn btn-info"><a href="create_utente.php">Create </a></button>
        </div>
    </div>


   </body>
  

</div>


