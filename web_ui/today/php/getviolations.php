<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

function js_link($src)
{
    return sprintf("<script type=\"text/javascript\" src=\"%s\"></script>",$src);
}

$id = $_GET['id'];
$number = 0;
$noviolations = true;
echo js_link("/js/window-handler.js");

$sql = mysqli_query($connection, "SELECT * FROM `violations` WHERE id LIKE '%{$id}%'");
while($row = mysqli_fetch_array($sql)){
  $completed = '';
  $flag = '0';
  $noviolations = false;
  if($row['completed']=='0'){
    $completed = 'off';
    $flag = '1';
  }else{
    $completed = 'on';
    $flag = '0';
  }
  $date_time = date_format(date_create($row['date']), 'm/d/y');
  $number=$number+1;
  echo(($number) . '. ' . $row['violation'] . '  (' . $date_time . ')' . '<img id="the_flag" src=/img/'.$completed.'.png style="width:20px;height=20px;" onclick="setViolationFlag(\''.$id
  .'\',\''. $flag .'\',\''. $row['violation'] .'\');"></img>' .'<br>');
}
if($noviolations == true){
  echo('No violations');
}

$connection->close();
?>
