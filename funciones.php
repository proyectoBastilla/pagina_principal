<?php
//Incluye la sesión y la base de datos
include("includes/database.php");

/*---IMPORTANTE---
ESTE IF DEFINE QUE FUNCIÓN SE USARÁ
LAS FUNCIONES ESTÁN DEFINIDAS DESPUÉS
EN EL MISMO ORDEN QUE SON NOMBRADAS AQUÍ*/

if ($_GET["a"]=="cambio") {

  //Toma el ID del libro para usar la función
  $id_lib = $_GET["id"];
  cambio_disponible($id_lib, $mysql);

} elseif ($_GET["a"]=="logout") {

  logout();

} elseif ($_GET["a"]=="edit") {

  edit();

} elseif ($_GET["a"]=="login") {

  //Toma los datos enviados por el form
  $correo = $_POST["correo"];
  $contra = $_POST["contra"];
  //Función con las variables externas necesarias
  login($mysql, $correo, $contra);

} elseif ($_GET["a"]=="verifica") {

  //Toma los datos enviados por el form
  $correo = $_POST["correo"];
  $contra = $_POST["contra"];
  //Función con las variables externas necesarias
  verifica($mysql, $correo, $contra);

} elseif ($_GET["a"]=="restablecer") {

  //Toma los datos enviados por el form
  $correo = $_POST["correo"];
  $contra1 = $_POST["contra"];
  $contra2 = $_POST["contra2"];
  //Función con las variables externas necesarias
  restablecer($mysql, $correo, $contra1, $contra2);

} elseif ($_GET["a"]=="registro") {

  //Toma los datos enviados por el form
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $correo = $_POST["correo"];
  $sexo = $_POST["sexo"];
  $edad = $_POST["edad"];
  $ocupacion = $_POST["ocupacion"];
  $interes = $_POST["interes"];
  $contra1 = $_POST["contra1"];
  $contra2= $_POST["contra2"];
  //Función con las variables externas necesarias
  registro($mysql, $nombre, $apellido, $correo, $sexo, $edad, $ocupacion, $interes, $contra1, $contra2);

} elseif ($_GET["a"]=="deseo") {

  //Toma el ID del libro y el usuario para usar la función
  $id_usuario = $_SESSION["id_iniciado"];
  $id_libro = $_SESSION["id_libro"];

  if ($_GET["e"]=="agregar") {
    agregarDeseo($mysql, $id_usuario, $id_libro);
  } elseif ($_GET["e"]=="quitar") {
    $id_deseo = $_GET["id"];
    quitarDeseo($mysql, $id_deseo, $id_libro);
  }

} elseif ($_GET["a"]=="like") {

  //Toma el ID del libro y el usuario para usar la función
  $id_usuario = $_SESSION["id_iniciado"];
  $id_libro = $_SESSION["id_libro"];
  //Función con las variables externas necesarias
  like($mysql, $id_libro, $id_usuario);

} elseif ($_GET["a"]=="dislike") {

  //Toma el ID del libro y el like para usar la función
  $id_libro = $_SESSION["id_libro"];
  $id_like = $_GET["id"];
  //Función con las variables externas necesarias
  dislike($mysql, $id_libro, $id_like);

} elseif (isset($_GET["buscar"])) {

  $infoBuscar = $_GET["buscar"];
  if (empty($infoBuscar)) {
    header("location: libros?pag=1");
  } else {
    header("location: libros?buscar=$infoBuscar&pag=1");
  }

}


/* DE AQUÍ EN ADELANTE EMPIEZAN LAS FUNCIONES COMO TAL */

function cambio_disponible($id, $mysql) {

  $query_id = "SELECT disponible FROM libros WHERE id='$id'";
  $result_id = mysqli_query($mysql, $query_id);
  $disponible = mysqli_fetch_array($result_id);

  if ($disponible["disponible"]==1) {
    $query_disp = "UPDATE libros SET disponible='' WHERE id='$id'";
    $result_disp = mysqli_query($mysql, $query_disp);
  } else {
    $query_disp = "UPDATE libros SET disponible='1' WHERE id='$id'";
    $result_disp = mysqli_query($mysql, $query_disp);
  }
  $id_back = $id - 3;
  header("location: gestor#libro-$id_back");
}


function logout() {
  session_unset();
  header("location: index");
}


function edit() {
  //Define la variable de sesión para enviarla a "mail.php"
  $_SESSION["correo"] = $_POST["correo"];

  //Va a "mail.php" con el correo definido en cambio de contraseña
  header("location: mail?type=restablecer");
}


function login($mysql, $correo, $contra) {

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

        //Si todo está bien hace query para buscar nombre del usuario y su id
        $query_nombre = "SELECT nombre, apellido, id FROM usuarios WHERE email='$correo'";
        $result_nombre = mysqli_query($mysql, $query_nombre);
        $nombre = mysqli_fetch_array($result_nombre);

        $_SESSION["nombre_iniciado"] = $nombre["nombre"]; //Nombre del usuario para verlo en pantalla
        $_SESSION["apellido_iniciado"] = $nombre["apellido"]; //Guardar apellido para uso posterior
        $_SESSION["id_iniciado"] = $nombre["id"];
        $_SESSION["correo_iniciado"] = $correo; //Guardar el correo para uso posterior
        $_SESSION["correo"] = $correo; //Para leerlo en el mail
        $_SESSION["sesion"] = true; //Indica que hay sesión iniciada
        header("location: index"); //Vuelve al inicio con la sesión iniciada

      } else {
        $_SESSION["mensaje"] = "La cuenta no está verificada";
        $_SESSION["mensaje_color"] = "warning";
        header("location: login");
      }

    } else {
      $_SESSION["mensaje"] = "La contraseña es incorrecta";
      $_SESSION["mensaje_color"] = "danger";
      header("location: login");
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
        header("location: index");

      } else {
        $_SESSION["mensaje"] = "La contraseña es incorrecta";
        $_SESSION["mensaje_color"] = "danger";
        header("location: login");
      }
    } else {
      $_SESSION["mensaje"] = "El correo no está registrado";
      $_SESSION["mensaje_color"] = "danger";
      header("location: login");
    }
  }
}


function verifica($mysql, $correo, $contra) {

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
    header("location: index");

  } else {
    //Si hay algo mal, manda de nuevo a verificar con el error
    $_SESSION["mensaje"] = "Error de verificación";
    $_SESSION["mensaje_color"] = "danger";
    header("location: login?id=verifica");
  }
}


function restablecer($mysql, $correo, $contra1, $contra2) {

  //Busco el correo en base de datos
  $query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
  $result_correo = mysqli_query($mysql, $query_correo);
  $correo_db = mysqli_fetch_array($result_correo);

  //Revisión si ingresa todos los datos
  if(empty($correo) || empty($contra1) || empty($contra2)) {
    //Vuelve al login con el error respectivo
    $_SESSION["mensaje"] = "Por favor, llena todos los campos correctamente";
    $_SESSION["mensaje_color"] = "danger";
    header("location: login?id=restablecer");

  } elseif ($contra1 != $contra2) {
    //Verifica que las contraseñas coincidan y manda el error si no
    $_SESSION["mensaje"] = "Las contraseñas no coinciden";
    $_SESSION["mensaje_color"] = "danger";
    header("location: login?id=restablecer");

  } elseif (empty($correo_db)) {
    //Si el correo no existe manda el error
    $_SESSION["mensaje"] = "El correo no está registrado";
    $_SESSION["mensaje_color"] = "warning";
    header("location: login?id=restablecer");

  } else {
    //Si todo funciona bien, actualiza la contraseña en base de datos
    $query_restablecer = "UPDATE usuarios SET contraseña='$contra2' WHERE email='$correo'";
    $result_restablecer = mysqli_query($mysql, $query_restablecer);

    //Va al login normal con el mensaje exitoso
    $_SESSION["mensaje"] = "La contraseña fue restablecida correctamente";
    $_SESSION["mensaje_color"] = "success";
    header("location: login");
  }
}


function registro($mysql, $nombre, $apellido, $correo, $sexo, $edad, $ocupacion, $interes, $contra1, $contra2) {

  //Reviso si el correo ya existe
  $query_correo = "SELECT email FROM usuarios WHERE email='$correo'";
  $result_correo = mysqli_query($mysql, $query_correo);
  $correo_db = mysqli_fetch_array($result_correo);

  if (!empty($correo_db)) {
    //Vuelve al registro con el error respectivo
    $_SESSION["mensaje"] = "El correo ya está registrado";
    $_SESSION["mensaje_color"] = "warning";
    header("location: registro");

    //Revisa si se llenaron todos los campos del formulario
  } elseif(empty($nombre)||empty($apellido)||empty($correo)||empty($contra1)||empty($contra2)||empty($sexo)||empty($edad)||empty($ocupacion)||empty($interes)) {
    //Vuelve al registro con el error respectivo
    $_SESSION["mensaje"] = "Por favor, llena todos los campos correctamente";
    $_SESSION["mensaje_color"] = "danger";
    header("location: registro");

    //Revisa si las contraseñas coinciden
  } elseif ($contra1 != $contra2) {
    //Vuelve al registro con el error respectivo
    $_SESSION["mensaje"] = "Las contraseñas no coinciden";
    $_SESSION["mensaje_color"] = "danger";
    header("location: registro");

  } else {
    //Si todo está bien, se registra en la base de datos
    $query = "INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$contra1')";
    $result = mysqli_query($mysql, $query);
    //Se busca el id que adquirió el usuario
    $query_id = "SELECT id FROM usuarios WHERE email='$correo'";
    $result_id = mysqli_query($mysql, $query_id);
    $infoUsuario = mysqli_fetch_array($result_id); 
    $id = $infoUsuario["id"];
    //Registra la info adicional
    $query_info = "INSERT INTO usuarios_info (id, sexo, edad, ocupacion, intereses) VALUES ('$id', '$sexo', '$edad', '$ocupacion', '$interes')";
    $result_info = mysqli_query($mysql, $query_info);

    $_SESSION["mensaje"] = "Registro exitoso, revisa tu correo";
    $_SESSION["mensaje_color"] = "success";

    $_SESSION["correo"] = $correo;
    $_SESSION["nombre"] = $nombre;
    header("location: mail?type=verifica");
  }
}


function agregarDeseo($mysql, $id_usuario, $id_libro) {

  $query = "INSERT INTO deseos (libro, usuario) VALUES ('$id_libro', '$id_usuario')";
  $result = mysqli_query($mysql, $query);
  header("location: libros?a=desc&id=$id_libro");

}


function quitarDeseo($mysql, $id_deseo, $id_libro) {

  $query = "DELETE FROM deseos WHERE id='$id_deseo'";
  $result = mysqli_query($mysql, $query);
  header("location: libros?a=desc&id=$id_libro");

}


function like($mysql, $id_libro, $id_usuario) {

  $query = "INSERT INTO likes (libro, usuario) VALUES ('$id_libro', '$id_usuario')";
  $result = mysqli_query($mysql, $query);

  $query_like = "SELECT likes FROM libros WHERE id='$id_libro'";
  $result_like = mysqli_query($mysql, $query_like);
  $likes = mysqli_fetch_array($result_like);

  $contador = $likes["likes"];
  if (empty($contador)) {
    $contador = 1;
  } else {
    $contador++;
  }
  echo "$contador";

  $query_update = "UPDATE libros SET likes='$contador' WHERE id='$id_libro'";
  $result_update = mysqli_query($mysql, $query_update);

  header("location: libros?a=desc&id=$id_libro");

}


function dislike($mysql, $id_libro, $id_like) {

  $query = "DELETE FROM likes WHERE id='$id_like'";
  $result = mysqli_query($mysql, $query);

  $query_like = "SELECT likes FROM libros WHERE id='$id_libro'";
  $result_like = mysqli_query($mysql, $query_like);
  $likes = mysqli_fetch_array($result_like);

  $contador = $likes["likes"];
  $contador--;

  $query_update = "UPDATE libros SET likes='$contador' WHERE id='$id_libro'";
  $result_update = mysqli_query($mysql, $query_update);

  header("location: libros?a=desc&id=$id_libro");

}
?>
