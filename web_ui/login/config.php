<?php
//Pull '$base_url' and '$signin_url' from this file
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '\login\globalcon.php';
//Pull database configuration from this file
include $root . '\login\dbconf.php';

//Set this for global site use
$site_name = 'Test Site';

//Maximum Login Attempts
$max_attempts = 5;
//Timeout (in seconds) after max attempts are reached
$login_timeout = 300;
