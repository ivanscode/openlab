<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$argument = $_GET["id"];

$record_exists = FALSE;
$record_date = "";

$name = "";
$current_lab;
$sql1 = mysqli_query($connection, "SELECT * FROM `people` WHERE `number` LIKE '%{$argument}%'");
while($row2 = mysqli_fetch_array($sql1)){
  $name = $row2['name'];
  $current_lab = $row2['current_lab'];
}
echo $name;
if($name == ""){
  //Add new identity
  //Trigger window on main page
  $query = "UPDATE status SET new_id=1, last_id_scanned='{$argument}'";
  mysqli_query($connection, $query);
}else{
  $query = "UPDATE status SET new_id=0";
  mysqli_query($connection, $query);
  $checkdb = "SELECT * FROM `log` WHERE `name`='{$argument}' AND `signout`=0";
  $sqli = mysqli_query($connection, $checkdb);
  while($row = mysqli_fetch_array($sqli)){
      $record_exists = TRUE;
      $duplicate_id = $row['id'];
      $record_date = $row['tin'];
  }
  //The server runs at a wonky time, so here's a wonky method to modify that
  $time = date("Y-m-d h:i:s");
  $date = new DateTime($time);
  $date->modify('-4 hour');
  $date = date_format($date, "Y-m-d h:i:s");
  $blank = date_format(date_create("2000-01-01 00:00:00"), "Y-m-d h:i:s");

  $lab_description;
  $lab_room;
  $sql2 = mysqli_query($connection, "SELECT * FROM `labs` WHERE `title`='{$current_lab}'");
  while($row = mysqli_fetch_array($sql2)){
    $lab_description = $row['description'];
    $lab_room = $row['room'];
  }
  if($current_lab == 'Add New Lab'){
    $current_lab = 'None Established';
    $lab_room = '000';
  }

  $sql = "INSERT INTO log (name, room, description, tin, tout, signout) VALUES ('{$argument}', '{$lab_room}', '{$current_lab}', '{$date}', '{$blank}', '0')";
  if($record_exists==FALSE){if($connection->query($sql) === TRUE){}else{}}//Plug in the new sign-in
  else{//Add the time-out to existing record
    $query = "DELETE FROM log WHERE `id`={$duplicate_id}";
    mysqli_query($connection, $query);
    $query = "INSERT INTO log (name, room, description, tin, tout, signout) VALUES ('{$argument}', '{$lab_room}', '{$current_lab}', '{$record_date}', '{$date}', '1')";
    mysqli_query($connection, $query);
  }
}

$connection->close();
?>
