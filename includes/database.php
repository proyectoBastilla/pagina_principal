<?php
//comenzar las variable de sesión
session_start();

//Info de la base de datos
$hostname = "localhost";
$username = "root";
$pass = "";
$database = "bastilla";

//Conexión a la base de datos
$mysql = mysqli_connect($hostname, $username, $pass, $database);

?>
