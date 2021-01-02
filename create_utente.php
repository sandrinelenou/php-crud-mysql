<?php
session_start();

 include('db.php');
  

  //CREARE nuovi dati in tabella

if(isset($_POST['submit'])){ // name="submit" controlla se la variabile è stata definita
    
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
    header("Location: leggere_dati.php");

mysqli_close($conn);

}

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
   

    <title>Server side Ajax</title>
   
  </head>
  <body>

    <!--display ALERT message-->
    <?php   
     if(isset($_SESSION['message'])) {   ?>
    <div class="alert alert-<?= $_SESSION['msg_type']?>">
       <?php 
        echo $_SESSION['message'];
        unset ($_SESSION['message']); 
       ?> 
    </div>
    <?php } ?>

    <div class="content pt-5">

        <h2 class="bg-success text-center">Pagina di Login</h2>
        <div class="col sm-6">
            <form action="" method="post" class="">

                <div class="form-group">
                    <label for="" class="for">Nome utente</label>
                    <input type="text" name="username" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="for">Password</label>
                    <input type="password" name="password" value="" class="form-control">
                </div>

                <input type="submit" name="submit" value="Invia" class="mt-4 btn btn-success">
            </form>

           
        </div>
    </div>
   </body>


</div>



