<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument_id = $_GET["id"];
$argument_email = $_GET["email"];
echo($argument_id . " " . $argument_email);

$namearray = array();
$namearray = explode("_", $argument_email);
$lastnamearray = array();
$lastnamearray = explode("@", $namearray[1]);
$name = ucfirst($namearray[0]) . " " . substr(ucfirst($lastnamearray[0]), 0, -2);

echo($name . " " . $argument_email);

$sql = "INSERT INTO people (name, email, number) VALUES ('{$name}', '{$argument_email}', '{$argument_id}')";
mysqli_query($connection, $sql);

$connection->close();
?>
