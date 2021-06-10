<?php
include("includes/database.php");

//Recibo las variables del correo y la contraseña ingresadas
$correo = $_POST["correo"];
$contra = $_POST["contra"];

//Hago query para ver si existe el correo
$query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
$result_correo = mysqli_query($mysql, $query_correo);
$string_correo = mysqli_fetch_array($result_correo);
//Query para saber cual es la contraseña
$query_contra = "SELECT contraseña FROM usuarios WHERE email='$correo'";
$result_contra = mysqli_query($mysql, $query_contra);
$string_contra = mysqli_fetch_array($result_contra);

//Verificación que todo esté bien
if (!empty($string_correo) && !empty($string_contra) && $string_contra["contraseña"]==$contra) {

  $query_verifica = "UPDATE usuarios SET verificación='1' WHERE email='$correo'";
  $result_verifica = mysqli_query($mysql, $query_verifica);

  $query_nombre = "SELECT nombre FROM usuarios WHERE email='$correo'";
  $result_nombre = mysqli_query($mysql, $query_nombre);
  $nombre = mysqli_fetch_array($result_nombre);

  $_SESSION["iniciado"] = $nombre["nombre"];
  $_SESSION["sesion"] = true;
  header("location: 01_index.php");

} else {
  $_SESSION["mensaje"] = "Error de verificación";
  $_SESSION["mensaje_color"] = "danger";
  header("location: 02_login_page.php?id=verifica");
}
?>
