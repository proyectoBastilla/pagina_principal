<?php
session_start();

$_SESSION["correo"] = $_POST["correo"];

header("location: mail.php?type=restablecer");
?>
