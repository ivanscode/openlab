<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$id = $_GET['id'];
$violation = $_GET['violation'];

$time = date("Y-m-d");
$date = new DateTime($time);
$date->modify('-4 hour');
$date = date_format($date, "Y-m-d");

$query = "INSERT INTO violations (violation, date, id) VALUES ('{$violation}', '{$date}', '{$id}')";
mysqli_query($connection, $query);

$connection->close();
 ?>
