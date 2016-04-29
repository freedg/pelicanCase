<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eagleSheet";
$id = $_POST["id"]; 
$item = $_POST["item"];
$in_or_out = $_POST["in_or_out"];
$purpose = $_POST["purpose"];
$returned = $_POST["returned"];
include "dictionary.php";


foreach ($idDictionary as $key => $val) {
    if($id == $key) {
      $id = $val;
    }
}
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO signInOut (NAME, ITEM, PURPOSE, RETURN_DATE, IN_OR_OUT)
VALUES ('$id', '$item', '$purpose', '$returned', '$in_or_out')";

if ($conn->query($sql) === TRUE) {
  header("Location: https://raw.githubusercontent.com/freedg/pelicanCase/master/signOut.php");
  die();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
