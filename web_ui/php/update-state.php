<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET["state"];

if($argument == 2){
  $sql = mysqli_query($connection, "SELECT * FROM `status`");
  while($row = mysqli_fetch_array($sql)){
    echo $row['state'];
  }
}else{
  $query = "UPDATE status SET state={$argument}";
  mysqli_query($connection, $query);
}

$connection->close();
?>
