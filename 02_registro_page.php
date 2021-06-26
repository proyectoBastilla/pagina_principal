<?php
//Includes de la conexión a la base de datos y el header
include("includes/database.php");
//Cierra sesión si quiere registrarse después del logeo
if (isset($_SESSION["sesion"])) {
  session_unset();
}
include("includes/header.php");
?>

<!-- Aquí comienza la página como tal -->
<div id="margenes_login">

  <!-- Mensaje emergente sobre un posible error de registro (opcional) -->
  <?php if (isset($_SESSION["mensaje"])) { ?>
    <div class="container alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION["mensaje"] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset(); ?>
  <?php } ?>

  <!-- Recuadro específico del registro -->
  <div class="card card-body">
    <div class="container pt-4">
      <p>Registra tu información personal</p>
    </div>
    <!-- Form de registro -->
    <form action="02_registro.php" method="post">
      <div class="form-group pt-4">
        <input class="form-control" type="text" name="nombre" placeholder="Nombre(s)" autofocus>
      </div>

      <div class="form-group pt-4">
        <input class="form-control" type="text" name="apellido" placeholder="Apellido(s)">
      </div>

      <div class="form-group pt-4">
        <input class="form-control" type="email" name="correo" placeholder="Correo Electrónico">
      </div>

      <div class="form-group pt-5">
        <input class="form-control" type="password" name="contra1" placeholder="Contraseña">
      </div>

      <div class="form-group pt-4">
        <input class="form-control" type="password" name="contra2" placeholder="Repite la contraseña">
      </div>

      <div class="form-group pt-5 pb-4">
        <input class="btn btn-primary" type="submit" name="enviar" value="Regístrate">
      </div>
    </form>
  </div>
</div>

<?php include("includes/footer.php"); ?>
