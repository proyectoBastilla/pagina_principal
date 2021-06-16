<?php

//      ¡¡ESTE ARCHIVO HAY QUE CORREGIRLO!!



//Inicia sesión y conecta a base de datos
include("includes/database.php");

//Toma los datos enviados por el form
$correo = $_POST["correo"];
$contra = $_POST["contra"];

//Query para ver que la cuenta esté verificada
$query_verifica = "SELECT verificación FROM usuarios WHERE email='$correo'";
$result_verifica = mysqli_query($mysql, $query_verifica);
$verificacion = mysqli_fetch_array($result_verifica);

if ($verificacion["verificación"]!=0) {

  //Query para ver que la cuenta exista
  $query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
  $result_correo = mysqli_query($mysql, $query_correo);
  $string_correo = mysqli_fetch_array($result_correo);

  if (!empty($string_correo)) {

    //Query para ver que la contraseña esté bien. ESTO HAY QUE CORREGIRLO
    $query_contra = "SELECT contraseña FROM usuarios WHERE contraseña='$contra'";
    $result_contra = mysqli_query($mysql, $query_contra);
    $string_contra = mysqli_fetch_array($result_contra);

    if (!empty($string_contra)) {

      //Si todo está bien hace query para buscar nombre del usuario
      $query_nombre = "SELECT nombre FROM usuarios WHERE email='$correo'";
      $result_nombre = mysqli_query($mysql, $query_nombre);
      $nombre = mysqli_fetch_array($result_nombre);

      $_SESSION["iniciado"] = $nombre["nombre"]; //Nombre del usuario para verlo en pantalla
      $_SESSION["sesion"] = true; //Indica que hay sesión iniciada
      header("location: 01_index.php"); //Vuelve al inicio con la sesión iniciada

    } else {
      //Vuelve al login con el error respectivo
      $_SESSION["mensaje"] = "La contraseña es incorrecta";
      $_SESSION["mensaje_color"] = "danger";
      header("location: 02_login_page.php");
    }
  } else {
    //Vuelve al login con el error respectivo
    $_SESSION["mensaje"] = "El correo no está registrado";
    $_SESSION["mensaje_color"] = "danger";
    header("location: 02_login_page.php");
  }
} else {
  //Vuelve al login con el error respectivo
  $_SESSION["mensaje"] = "La cuenta no está verificada";
  $_SESSION["mensaje_color"] = "warning";
  header("location: 02_login_page.php");

}

?>
