<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

// Define $myusername and $mypassword
$username = $_POST["username"];
$password = $_POST["password"];

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);

$sql = mysqli_query($connection, "SELECT * FROM `login` WHERE `username`='{$username}' AND `password`='{$password}'");

$true = false;

while($row = mysqli_fetch_array($sql)){
  $temp = $row['username'];
  $true = true;
}

if($true == true){
  $_SESSION['username'] = $username;
  $_SESSION['valid'] = true;
  echo ("true");
}else{
  echo ("false");
}

 ?>
