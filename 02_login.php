<?php
//Inicia sesión y conecta a base de datos
include("includes/database.php");

//Toma los datos enviados por el form
$correo = $_POST["correo"];
$contra = $_POST["contra"];

//Query para ver que la cuenta exista entre los usuarios
$query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
$result_correo = mysqli_query($mysql, $query_correo);
$string_correo = mysqli_fetch_array($result_correo);

if (!empty($string_correo)) {

  //Query para ver que la contraseña esté bien
  $query_contra = "SELECT contraseña FROM usuarios WHERE email='$correo'";
  $result_contra = mysqli_query($mysql, $query_contra);
  $string_contra = mysqli_fetch_array($result_contra);

  if ($string_contra["contraseña"]==$contra) {

    //Query para ver que la cuenta esté verificada
    $query_verifica = "SELECT verificación FROM usuarios WHERE email='$correo'";
    $result_verifica = mysqli_query($mysql, $query_verifica);
    $verificacion = mysqli_fetch_array($result_verifica);

    if ($verificacion["verificación"]!=0) {

      //Si todo está bien hace query para buscar nombre del usuario
      $query_nombre = "SELECT nombre FROM usuarios WHERE email='$correo'";
      $result_nombre = mysqli_query($mysql, $query_nombre);
      $nombre = mysqli_fetch_array($result_nombre);

      //Busca el apellido en la base de datos para uso posterior
      $query_apellido = "SELECT apellido FROM usuarios WHERE email='$correo'";
      $result_apellido = mysqli_query($mysql, $query_apellido);
      $apellido = mysqli_fetch_array($result_apellido);

      $_SESSION["nombre_iniciado"] = $nombre["nombre"]; //Nombre del usuario para verlo en pantalla
      $_SESSION["apellido_iniciado"] = $apellido["apellido"]; //Guardar apellido para uso posterior
      $_SESSION["correo_iniciado"] = $correo; //Guardar el correo para uso posterior
      $_SESSION["correo"] = $correo; //Para leerlo en el mail
      $_SESSION["sesion"] = true; //Indica que hay sesión iniciada
      header("location: 01_index.php"); //Vuelve al inicio con la sesión iniciada

    } else {
      $_SESSION["mensaje"] = "La cuenta no está verificada";
      $_SESSION["mensaje_color"] = "warning";
      header("location: 02_login_page.php");
    }

  } else {
    $_SESSION["mensaje"] = "La contraseña es incorrecta";
    $_SESSION["mensaje_color"] = "danger";
    header("location: 02_login_page.php");
  }

} else {

  //Query para ver si es una cuenta de librería
  $query_libreria = "SELECT email FROM librerias WHERE email='$correo'";
  $result_libreria = mysqli_query($mysql, $query_libreria);
  $string_libreria = mysqli_fetch_array($result_libreria);

  if (!empty($string_libreria)) {

    //Query para ver que la contraseña esté bien
    $query_contra = "SELECT contraseña FROM librerias WHERE email='$correo'";
    $result_contra = mysqli_query($mysql, $query_contra);
    $string_contra = mysqli_fetch_array($result_contra);

    if ($string_contra["contraseña"]==$contra) {

      //Query para buscar el nombre de la librería
      $query_nombre = "SELECT nombre FROM librerias WHERE email='$correo'";
      $result_nombre = mysqli_query($mysql, $query_nombre);
      $nombre = mysqli_fetch_array($result_nombre);

      //Query para buscar el id de la librería
      $query_id = "SELECT id FROM librerias WHERE email='$correo'";
      $result_id = mysqli_query($mysql, $query_id);
      $id = mysqli_fetch_array($result_id);

      //Inicializa variables de sesión para dar acceso a las cosas específicas de librería
      $_SESSION["sesion"] = true;
      $_SESSION["libreria"] = true;
      $_SESSION["nombre_lib"] = $nombre["nombre"];
      $_SESSION["correo_lib"] = $correo;
      $_SESSION["id_lib"] = $id["id"];
      header("location: 01_index.php");

    }

  } else {
    $_SESSION["mensaje"] = "El correo no está registrado";
    $_SESSION["mensaje_color"] = "danger";
    header("location: 02_login_page.php");
  }

}

?>
