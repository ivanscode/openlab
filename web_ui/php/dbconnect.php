<?php
$servername = "208.91.199.11:3306";
$username = "ikouzmine";
$password = "0t8V2ukPcYY!";
$dbname = "openlab_signin";

$connection = mysqli_connect($servername, $username, $password, $dbname);

 if($connection == false) {
     die("Error: " . mysqli_error_connect());
 }
?>
