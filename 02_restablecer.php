<?php
include("includes/database.php");

$correo = $_POST["correo"];
$contra1 = $_POST["contra"];
$contra2 = $_POST["contra2"];

$query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
$result_correo = mysqli_query($mysql, $query_correo);
$correo_db = mysqli_fetch_array($result_correo);

if(empty($correo) || empty($contra1) || empty($contra2)) {

  $_SESSION["mensaje"] = "Por favor, llena todos los campos correctamente";
  $_SESSION["mensaje_color"] = "danger";
  header("location: 02_login_page.php?id=restablecer");

} elseif ($contra1 != $contra2) {

  $_SESSION["mensaje"] = "Las contraseñas no coinciden";
  $_SESSION["mensaje_color"] = "danger";
  header("location: 02_login_page.php?id=restablecer");

} elseif (empty($correo_db)) {

  $_SESSION["mensaje"] = "El correo no está registrado";
  $_SESSION["mensaje_color"] = "warning";
  header("location: 02_login_page.php?id=restablecer");

} else {

  $query_restablecer = "UPDATE usuarios SET contraseña='$contra2' WHERE email='$correo'";
  $result_restablecer = mysqli_query($mysql, $query_restablecer);

  $_SESSION["mensaje"] = "La contraseña fue restablecida correctamente";
  $_SESSION["mensaje_color"] = "success";
  header("location: 02_login_page.php");

}

?>
