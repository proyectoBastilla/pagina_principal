<?php
//Inicio de variables de sesión y conexión base de datos
include("includes/database.php");

//Tomo toda la info del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contra1 = $_POST["contra1"];
$contra2= $_POST["contra2"];

//Reviso si el correo ya existe
$query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
$result_correo = mysqli_query($mysql, $query_correo);
$correo_db = mysqli_fetch_array($result_correo);

if (!empty($correo_db)) {
  //Vuelve al registro con el error respectivo
  $_SESSION["mensaje"] = "El correo ya está registrado";
  $_SESSION["mensaje_color"] = "warning";
  header("location: 02_registro_page.php");

  //Revisa si se llenaron todos los campos del formulario
} elseif(empty($nombre) || empty($apellido) || empty($correo) || empty($contra1) || empty($contra2)) {
  //Vuelve al registro con el error respectivo
  $_SESSION["mensaje"] = "Por favor, llena todos los campos correctamente";
  $_SESSION["mensaje_color"] = "danger";
  header("location: 02_registro_page.php");

  //Revisa si las contraseñas coinciden
} elseif ($contra1 != $contra2) {
  //Vuelve al registro con el error respectivo
  $_SESSION["mensaje"] = "Las contraseñas no coinciden";
  $_SESSION["mensaje_color"] = "danger";
  header("location: 02_registro_page.php");

} else {
  //Si todo está bien, se registra en la base de datos
  $query = "INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$contra1')";
  $result = mysqli_query($mysql, $query);

  $_SESSION["mensaje"] = "Registro exitoso, revisa tu correo";
  $_SESSION["mensaje_color"] = "success";

  $_SESSION["correo"] = $correo;
  $_SESSION["nombre"] = $nombre;
  header("location: 02_mail.php?type=verifica");
}

?>
