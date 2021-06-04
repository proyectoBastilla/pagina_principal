<?php

include("includes/database.php");

$correo = $_POST["correo"];
$contra = $_POST["contra"];

$query_verifica = "SELECT verificación FROM usuarios WHERE email='$correo'";
$result_verifica = mysqli_query($mysql, $query_verifica);
$verificacion = mysqli_fetch_array($result_verifica);

if ($verificacion["verificación"]!=0) {

  $query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
  $result_correo = mysqli_query($mysql, $query_correo);
  $string_correo = mysqli_fetch_array($result_correo);

  if (!empty($string_correo)) {

    $query_contra = "SELECT contraseña FROM usuarios WHERE contraseña='$contra'";
    $result_contra = mysqli_query($mysql, $query_contra);
    $string_contra = mysqli_fetch_array($result_contra);

    if (!empty($string_contra)) {

      $query_nombre = "SELECT nombre FROM usuarios WHERE email='$correo'";
      $result_nombre = mysqli_query($mysql, $query_nombre);
      $nombre = mysqli_fetch_array($result_nombre);

      $_SESSION["iniciado"] = $nombre["nombre"];
      $_SESSION["mensaje"] = "Ha iniciado sesión correctamente";
      $_SESSION["mensaje_color"] = "success";
      $_SESSION["sesion"] = true;
      header("location: index.php");

    } else {
      $_SESSION["mensaje"] = "La contraseña es incorrecta";
      $_SESSION["mensaje_color"] = "danger";
      header("location: login_page.php");
    }
  } else {
    $_SESSION["mensaje"] = "El correo no está registrado";
    $_SESSION["mensaje_color"] = "danger";
    header("location: login_page.php");
  }
} else {
  $_SESSION["mensaje"] = "La cuenta no está verificada";
  $_SESSION["mensaje_color"] = "warning";
  header("location: login_page.php");

}






?>
