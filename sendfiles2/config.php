<?php
$host = "localhost";
$username = "root";
$password = "";
// $database = "registration";
$database = "user_db";

$connection = new mysqli($host, $username, $password, $database);

if(mysqli_connect_error()){
    echo "falhou" .mysqli_error();
    exit;
}

?>
