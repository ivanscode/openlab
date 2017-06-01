<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$email = '';

$sql = mysqli_query($connection, "SELECT * FROM `status`");
while($row = mysqli_fetch_array($sql)){
  $email = $row['last_email'];
}
$sql = mysqli_query($connection, "SELECT * FROM `labs` WHERE email='{$email}'");
while($row = mysqli_fetch_array($sql)){
  echo "<option>{$row['title']}</option>\n";
}
$query = "UPDATE labs SET last_email=''";
mysqli_query($connection, $query);
?>
