<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET["description"];
$id = $_GET["id"];

$query = "UPDATE log SET description='{$argument}' WHERE id={$id}";
mysqli_query($connection, $query);

$connection->close();
?>
