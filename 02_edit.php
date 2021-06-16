<?php
session_start();

//Define la variable de sesión para enviarla a "mail.php"
$_SESSION["correo"] = $_POST["correo"];

//Va a "mail.php" con el correo definido en cambio de contraseña
header("location: 02_mail.php?type=restablecer");
?>
