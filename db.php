<?php
$servername = "";
$username = "";
$password = "";
$db = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
//$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
  //echo "connected";
}
    
?>
