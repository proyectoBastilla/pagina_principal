<?php
//USAR ESTE ARCHIVO SOLO UNA VEZ
//CREA LA BASE DE DATOS DEL LOGIN AUTOMÁTICAMENTE EN CUALQUIER PC

include("database.php");

$query = "CREATE TABLE usuarios (
  id int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  nombre VARCHAR(40) NOT NULL,
  apellido VARCHAR(40) NOT NULL,
  email VARCHAR(100) NOT NULL,
  contraseña VARCHAR(20) NOT NULL,
  verificación bit(1) NOT NULL
)";

$result = mysqli_query($mysql, $query);

?>
