<?php

include("includes/database.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contra1 = $_POST["contra1"];
$contra2= $_POST["contra2"];

$query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
$result_correo = mysqli_query($mysql, $query_correo);
$correo_db = mysqli_fetch_array($result_correo);

if (!empty($correo_db)) {

  $_SESSION["mensaje"] = "El correo ya está registrado";
  $_SESSION["mensaje_color"] = "warning";
  header("location: registro_page.php");

} elseif(empty($nombre) || empty($apellido) || empty($correo) || empty($contra1) || empty($contra2)) {

  $_SESSION["mensaje"] = "Por favor, llena todos los campos correctamente";
  $_SESSION["mensaje_color"] = "danger";
  header("location: registro_page.php");

} elseif ($contra1 != $contra2) {

  $_SESSION["mensaje"] = "Las contraseñas no coinciden";
  $_SESSION["mensaje_color"] = "danger";
  header("location: registro_page.php");

} else {

  $query = "INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$contra1')";
  $result = mysqli_query($mysql, $query);

  $_SESSION["mensaje"] = "Registro exitoso, revisa tu correo";
  $_SESSION["mensaje_color"] = "success";

  $_SESSION["correo"] = $correo;
  $_SESSION["nombre"] = $nombre;
  header("location: mail.php?type=verifica");
}

?>
