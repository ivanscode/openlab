<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$id = $_GET['id'];
$flag = $_GET['flag'];
$violation = $_GET['violation'];

$time = date("Y-m-d");
$date = new DateTime($time);
$date->modify('-4 hour');
$date = date_format($date, "Y-m-d");

$query = "UPDATE violations SET completed={$flag} WHERE id LIKE '%{$id}%' AND violation='{$violation}'";
mysqli_query($connection, $query);

$connection->close();
?>
