<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET["id_state"];
if($argument == 3){
  $sql = mysqli_query($connection, "SELECT * FROM `status`");
  while($row = mysqli_fetch_array($sql)){
    echo $row['last_id_scanned'];
  }
}
if($argument == 2){
  $sql = mysqli_query($connection, "SELECT * FROM `status`");
  while($row = mysqli_fetch_array($sql)){
    echo $row['new_id'];
  }
}
if($argument == 0 || $argument == 1){
  $query = "UPDATE status SET new_id={$argument}";
  mysqli_query($connection, $query);
}

$connection->close();
?>
