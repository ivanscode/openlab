<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");
$checkdb = "SELECT * FROM `log` WHERE `signout`=0";
$sqli = mysqli_query($connection, $checkdb);
$ids_not_out = array();
while($row = mysqli_fetch_array($sqli)){
    array_push($ids_not_out, $row['id']);
}
$sql = mysqli_query($connection, "SELECT * FROM `log` ORDER BY id DESC");
while($row = mysqli_fetch_array($sql)){
  $date_time = date_format(date_create($row['tin']), 'm/d H:i');
  $date_time_out = date_format(date_create($row['tout']), 'm/d H:i');
  foreach ($ids_not_out as $key => $value){
    if ($row['id'] == $value){
        $date_time_out = 'Signed In';
        break;
    }
  }
  echo "<tr>\n"
."<th>{$row['name']}</th>\n"
."<th id='{$row['id']}' onclick='triggerRoomWindow(this.id)' style='cursor: pointer;'>{$row['room']}</th>\n"
."<th id='{$row['id']}' onclick='triggerDescriptionWindow(this.id)' style='cursor: pointer;'>{$row['description']}</th>\n"
."<th>{$date_time}</th>\n"
."<th>{$date_time_out}</th>\n"
."</tr>\n";
}
echo '</table>';
$connection->close();
?>
