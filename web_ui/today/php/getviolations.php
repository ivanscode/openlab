<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$id = $_GET['id'];
$number = 0;

$sql = mysqli_query($connection, "SELECT * FROM `violations` WHERE id LIKE '%{$id}%'");
while($row = mysqli_fetch_array($sql)){
  $date_time = date_format(date_create($row['date']), 'm/d/y');
  $number=$number+1;
  echo(($number) . '. ' . $row['violation'] . '  (' . $date_time . ')' .'<br>');
}

$connection->close();
?>
