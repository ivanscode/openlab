<?php
//DATABASE CONNECTION VARIABLES
$host = "208.91.199.11:3306"; // Host name
$username = "ikouzmine"; // Mysql username
$password = "0t8V2ukPcYY!"; // Mysql password
$db_name = "openlab_signin"; // Database name

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix."members";
$tbl_attempts = $tbl_prefix."loginAttempts";
