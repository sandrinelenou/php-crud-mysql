<?php
$servername = "ec2-3-90-124-60.compute-1.amazonaws.com";
$username = "qhxgzwfmxxcfrs";
$password = "6915d4723a1b1c5ec5c6ee119968083df6a64be211de0623fc250d0c6fe309a3";
$db = "d43q0g9orllb58";

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
