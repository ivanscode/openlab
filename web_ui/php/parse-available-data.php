<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "\php\dbconnect.php");

$counter = 0;
if ($file = fopen($root . "\php\PCut_Data.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $namearray = array();
        $namearray = explode("_", $line);
        $lastnamearray = array();
        $lastnamearray = explode("@", $namearray[1]);
        $name = ucfirst($namearray[0]) . " " . substr(ucfirst($lastnamearray[0]), 0, -2);
        $email = $namearray[0] . "_" . $lastnamearray[0] . "@milton.edu";
        $ia = substr($lastnamearray[1], 11);
        echo $ia;
        $query = "INSERT INTO people (name, email, number) VALUES ('{$name}', '{$email}', '{$ia}')";
        mysqli_query($connection, $query);
        # do same stuff with the $line
    }
    fclose($file);
}


$connection->close();

?>
