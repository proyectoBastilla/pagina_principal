<?php
session_start();
//Inclusión de archivos con info privada
include("private/credenciales.php");
include("private/correos.php");

//Estas líneas llaman los archivos y clases necesarias para el PHPMailer
require("vendor/autoload.php");

//Asignación mensaje del correo. Definidos en "private/correos"
if ($_GET["type"]=="verifica") {
  $asunto = $asunto_verifica;
  $cuerpo = $cuerpo_verifica;
} elseif ($_GET["type"]=="restablecer") {
  $asunto = $asunto_cambio;
  $cuerpo = $cuerpo_cambio;
} elseif ($_GET["type"]=="contacto") {
  $asunto = $asunto_contacto;
  $cuerpo = $cuerpo_contacto;
}

//Crea un objeto de SendGrid guardado en la variable $mail (POO u OOP)
$mail = new \SendGrid\Mail\Mail();

//Asignar emisor y receptor del correo
$mail->setFrom("$miCorreo", "Pasaje La Bastilla");

//Si es un correo de formulario de contacto, se enviará a sí mismo
if ($_GET["type"]=="contacto") {
  $mail->addTo("$miCorreo");
} else {
  $mail->addTo($_SESSION["correo"]);
}

//Asignar el mensaje que se hizo anteriormente
$mail->setSubject($asunto);
$mail->addContent("text/html",$cuerpo);

//Apikey de SendGrid
$key = "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";
$sendgrid = new \SendGrid($key);

try {
  
  $enviar = $sendgrid->send($mail);
  echo $enviar;

} catch (Exception $e) {
  
  echo "Algo salió mal:".$e->getMessage();

}
/*
if ($_GET["type"]=="contacto") {
  $_SESSION["mensaje"] = "Tu comentario se ha registrado";
  $_SESSION["mensaje_color"] = "success";
  header("location: acerca#contacto");
} else {
  header("location: login");
  $_SESSION["mensaje"] = "Revisa tu bandeja de entrada";
  $_SESSION["mensaje_color"] = "success";
}*/

?>
