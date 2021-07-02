<?php
//comenzar las variable de sesión
session_start();

//Info de la base de datos
$hostname = "pk1l4ihepirw9fob.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "f0y9mqihkc6y6naj";
$pass = "s09kg7c5q4h2awys";
$database = "oskczpdu2k8pa546";

mysql://b15c0ca9f35fb4:84d89edc@us-cdbr-east-04.cleardb.com/heroku_b7e512c7aea154b?reconnect=true

//Conexión a la base de datos
$mysql = mysqli_connect($hostname, $username, $pass, $database);

?>
