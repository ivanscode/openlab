<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET['email'];

$query = "UPDATE status SET last_email='{$argument}'";
mysqli_query($connection, $query);
?>
