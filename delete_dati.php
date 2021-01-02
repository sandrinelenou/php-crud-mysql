
<?php
 include('db.php');

//LEGGERE nuovi dati in tabella

$query= "SELECT * FROM utenti";
$result = mysqli_query($conn, $query);
if($result){
    //foreach($row as $result){
        echo("good select");
    
}else{
    echo("errore".mysqli_error($conn));
}

//AGGIORNARE dati in tabella

if(isset($_POST['delete'])){ // name="submit" controlla se la variabile è stata definita
   
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $id = $_POST['id_utente'];

    $query2= "UPDATE utenti SET username = '$user', password = '$pass' WHERE = id = $id";
    $result2 = mysqli_query($conn, $query2);
    if($result2){
        echo "aggiornato con successo";
    }else{
        echo "richiesta fallita"; 
    }
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
   

    <title>Aggiornare i dati utenti con PHP</title>
   
  </head>
  <body>
    <div class="content pt-5">
    <h2 class="bg-success text-center">Aggiornare i dati utenti</h2>
        <div class="col sm-6">
            <form action="update_dati.php" method="post" class="">

                <div class="form-group">
                    <label for="" class="for">Nome utente</label>
                    <input type="text" name="username" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="for">Password</label>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">
                    <select class="" name="">
                        <?php foreach($result as $row){ //mysqli_fetch_assoc($result)
                            $id = $row['id_utente'];
                            $name = $row['username'];
                            echo "<option value='$id'>$id</option>";   //<option value="<?php echo $id; ?>"><?php echo $id; ?></option>                  
                            ?>
                            
                       <?php }?> 
                      
                    </select>
                </div>

                <input type="submit" name="submit" value="Aggiorna" class="mt-4 btn btn-success">
               
            </form>

           
        </div>
    </div>
   </body>


</div>


