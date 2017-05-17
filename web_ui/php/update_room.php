<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET["room"];
$id = $_GET["id"];

$query = "UPDATE log SET room={$argument} WHERE id={$id}";
mysqli_query($connection, $query);

$connection->close();
?>
