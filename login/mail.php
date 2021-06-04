<?php
session_start();
//Inclusión de archivos con info privada
include("private/correo.php");

//Estas líneas llaman los archivos y clases necesarias para el PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require("vendor/autoload.php");

//Mensaje como tal en HTML
$asunto = "Verifica tu cuenta La Bastilla";
$cuerpo =
'<html>
  <head>
  <style type="text/css">
    h1 {
      color: green;
      font-family: Verdana;
    }
  </style>
  </head>
  <body>
    <div>
      <h1>¡Te has registrado satisfactoriamente!</h1>
    </div>
    <div>
      <h3>El pasaje de librerías La Bastilla te da la bienvenida, este es el lugar donde podrás encontrar la disponibilidad de libros de tus tiendas favoritas a tan solo unos clicks de distancia.<br><br>Para poder usar todas nuestras funcionalidades verifica tu cuenta en el enlace de abajo:</h3>
    </div>
    <div>
      <a href="localhost/login/login_page.php?id=verificacion">Verifica tu cuenta</a>
    </div>
  </body>
</html>'
;

//Crea un objeto del PHPMailer guardado en la variable $mail (POO u OOP)
$mail = new PHPMailer();

try {
  //Configuración servidor
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com"; //Servidor de gmail (solo manda correos a gmail o institucional soportado en gmail)
  $mail->SMTPAuth = true;
  $mail->Username = "$miCorreo";
  $mail->Password = "$miContra";
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Encriptación TLS
  $mail->Port = 587; //Puerto usado para la encriptación TLS

  //Asignar emisor y receptor del correo
  $mail->setFrom("$miCorreo", "Pasaje La Bastilla");
  $mail->addAddress($_SESSION["correo"]);

  //Asignar el mensaje que se hizo anteriormente
  $mail->isHTML(true);
  $mail->Subject = $asunto;
  $mail->Body = $cuerpo;

  //Enviar mensaje
  $mail->send();

} catch (Exception $e) {
  echo "Algo salió mal:".$e->getMessage();
}
header("location: index.php");
?>
