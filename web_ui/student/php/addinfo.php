<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$selected_key = $_POST['dropdown'];
$email = $_POST['email'];
$title = $_POST["title"];
$room = $_POST["room"];
$description = $_POST["description"];

if($selected_key == "Add New Lab"){
  $query = "INSERT INTO labs (email, title, description, room) VALUES ('{$email}', '{$title}', '{$description}', $room)";
  if($connection->query($query) === TRUE){
    echo "record created";
    $query = "UPDATE people SET current_lab='{$title}' WHERE email='{$email}'";
    mysqli_query($connection, $query);
    header('Location: /');
  }else{
    echo "something went wrong";
  }
}else{
  $query = "UPDATE people SET current_lab='$selected_key' WHERE email='{$email}'";
  mysqli_query($connection, $query);
  header('Location: /');
}


?>
