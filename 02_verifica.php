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

  //Actualiza el estado de verificación
  $query_verifica = "UPDATE usuarios SET verificación='1' WHERE email='$correo'";
  $result_verifica = mysqli_query($mysql, $query_verifica);

  //Busca nombre y apellido para uso posterior
  $query_nombre = "SELECT nombre FROM usuarios WHERE email='$correo'";
  $result_nombre = mysqli_query($mysql, $query_nombre);
  $nombre = mysqli_fetch_array($result_nombre);

  $query_apellido = "SELECT apellido FROM usuarios WHERE email='$correo'";
  $result_apellido = mysqli_query($mysql, $query_apellido);
  $apellido = mysqli_fetch_array($result_apellido);

  //Asigna las variables de sesión
  $_SESSION["nombre_iniciado"] = $nombre["nombre"]; //Nombre del usuario para verlo en pantalla
  $_SESSION["apellido_iniciado"] = $apellido["apellido"]; //Guardar apellido para uso posterior
  $_SESSION["correo_iniciado"] = $correo; //Guardar el correo para uso posterior
  $_SESSION["sesion"] = true; //Indica que la sesión está iniciada
  header("location: 01_index.php");

} else {
  //Si hay algo mal, manda de nuevo a verificar con el error
  $_SESSION["mensaje"] = "Error de verificación";
  $_SESSION["mensaje_color"] = "danger";
  header("location: 02_login_page.php?id=verifica");
}
?>
