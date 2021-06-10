<?php
session_start();

$_SESSION["correo"] = $_POST["correo"];

header("location: 02_mail.php?type=restablecer");
?>
