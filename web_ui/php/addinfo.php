<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET["id"];

$record_exists = FALSE;
$record_date = "";
$checkdb = "SELECT * FROM `log` WHERE `name`='{$argument}' AND `signout`=0";
$sqli = mysqli_query($connection, $checkdb);
while($row = mysqli_fetch_array($sqli)){
    $record_exists = TRUE;
    $duplicate_id = $row['id'];
    $record_date = $row['tin'];
}

$time = date("Y-m-d h:i:s");
$date = new DateTime($time);
$date->modify('-4 hour');
$date = date_format($date, "Y-m-d h:i:s");
$blank = date_format(date_create("2000-01-01 00:00:00"), "Y-m-d h:i:s");

$sql = "INSERT INTO log (name, room, description, tin, tout, signout) VALUES ('{$argument}', '109', 'None Entered', '{$date}', '{$blank}', '0')";
if($record_exists==FALSE){if($connection->query($sql) === TRUE){}else{}}
else{
  $query = "DELETE FROM log WHERE `id`={$duplicate_id}";
  mysqli_query($connection, $query);
  $query = "INSERT INTO log (name, room, description, tin, tout, signout) VALUES ('{$argument}', '109', 'Stuff', '{$record_date}', '{$date}', '1')";
  mysqli_query($connection, $query);
}

$connection->close();
?>
