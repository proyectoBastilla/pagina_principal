<?php
//comenzar las variable de sesión
session_start();

//Info de la base de datos
$hostname = "pk1l4ihepirw9fob.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	";
$username = "uny9vwv876ich7lr";
$pass = "j5gtrvpb7ygtcrct";
$database = "j0nh1bs9c8hd9u5o";

//Conexión a la base de datos
$mysql = mysqli_connect($hostname, $username, $pass, $database);

?>
