<?php
session_start();
//Inclusión de archivos con info privada
include("private/credenciales.php");
include("private/correos.php");

//Estas líneas llaman los archivos y clases necesarias para el PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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

//Crea un objeto del PHPMailer guardado en la variable $mail (POO u OOP)
$mail = new PHPMailer();

try {
  //Configuración servidor
  $mail->isSMTP();
  $mail->Mailer = "smtp";
  $mail->Host = "smtp.sendgrid.net"; //Servidor de gmail (solo manda correos a gmail o institucional soportado en gmail)
  $mail->SMTPAuth = true;
  $mail->Username = "apikey";
  $mail->Password = "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";
  $mail->SMTPSecure = "ssl"; //Encriptación SSL
  $mail->Port = 465; //Puerto usado para la encriptación SSL

  //Asignar emisor y receptor del correo
  $mail->setFrom("apikey", "Pasaje La Bastilla");
  //Si es un correo de formulario de contacto, se enviará a sí mismo
  if ($_GET["type"]=="contacto") {
    $mail->addAddress("$miCorreo");
  } else {
    $mail->addAddress($_SESSION["correo"]);
  }

  //Asignar el mensaje que se hizo anteriormente
  //Si es un correo de formulario de contacto no será HTML
  if ($_GET["type"]=="contacto") {
    $mail->isHTML(false);
  } else {
    $mail->isHTML(true);
  }
  $mail->CharSet = "UTF-8";
  $mail->Subject = $asunto;
  $mail->Body = $cuerpo;

  //Enviar mensaje
  $mail->send();

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
