<?php

$host = 'localhost';
$database = 'database_4people';
$user = 'root';
$password = '';

$db = new mysqli($host, $user, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>