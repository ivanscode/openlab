<?php
include($root . "\php\dbconnect.php");

//Check for people who are not yet signed out
$checkdb = "SELECT * FROM `log` WHERE `signout`=0";
$sqli = mysqli_query($connection, $checkdb);
$ids_not_out = array();
//Fetch any none signed out people
while($row = mysqli_fetch_array($sqli)){
    array_push($ids_not_out, $row['id']);
}
//Sort time
$time = date("Y-m-d h:i:s");
$date = new DateTime($time);
$nextday = $date;
$date->modify('-4 hour');
$date->modify('-1 day');
$date = date_format($date, "Y-m-d");
$nextday->modify('+1 day');
$nextday = date_format($nextday, "Y-m-d");
$sql;

//Fetch all people
if($islog == false){
  $sql = mysqli_query($connection, "SELECT * FROM `log` WHERE tin >='{$date} 00:00:00' AND tin <'{$nextday} 00:00:00' ORDER BY id DESC");
}else{
  $sql = mysqli_query($connection, "SELECT * FROM `log` ORDER BY id DESC");
}
while($row = mysqli_fetch_array($sql)){
  $class_color = "green";
  $date_time = date_format(date_create($row['tin']), 'm/d H:i');
  $date_time_out = date_format(date_create($row['tout']), 'm/d H:i');
  //Compare if the person is not signed out
  foreach ($ids_not_out as $key => $value){
    if ($row['id'] == $value){
        $date_time_out = 'Signed In';
        $class_color = "red";
        break;
    }
  }
  //Fetch names associated to id number
  $name = "";
  $violations = 0;
  $sql1 = mysqli_query($connection, "SELECT * FROM `people` WHERE `number` LIKE '%{$row['name']}%'");
  while($row2 = mysqli_fetch_array($sql1)){
    $name = $row2['name'];
    $violations = $row2['violations'];
  }
  if($name == ""){
    $name = $row['name'];
  }
  //Print to table
  echo "<tr class='{$class_color}'>\n"
."<th>{$name}</th>\n"
."<th id='{$row['id']}' onclick='triggerRoomWindow(this.id)' style='cursor: pointer;'>{$row['room']}</th>\n"
."<th id='{$row['id']}' onclick='triggerDescriptionWindow(this.id)' style='cursor: pointer;'>{$row['description']}</th>\n"
."<th>{$date_time}</th>\n"
."<th>{$date_time_out}</th>\n"
."<th><span id='{$row['id']}' style='cursor:pointer;' onclick='triggerShowViolationsWindow(this.id)'>{$violations}</span><span><img id='{$row['id']}' onclick='triggerAddViolationsWindow(this.id)' src='/img/add.png' style='width:10px;height:10px;float:right;cursor: pointer;'></img></span></th>\n"
."</tr>\n";
}
echo '</table>';

$connection->close();
?>
