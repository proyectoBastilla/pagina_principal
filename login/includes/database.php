<?php
//comenzar las variable de sesión
session_start();

//conexión a la base de datos
$hostname = "localhost";
$username = "root";
$pass = "";
$database = "login";

$mysql = mysqli_connect($hostname, $username, $pass, $database);

?>
