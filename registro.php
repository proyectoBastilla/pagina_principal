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
<div class="margenes-login">

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
      <h5 class="text-center">Registra tu información personal</h5>
    </div>
    <!-- Form de registro -->
    <form action="funciones.php?a=registro" method="post">

      <div class="form-group row pt-4">
        <div class="col">
          <input class="form-control" type="text" name="nombre" placeholder="Nombre(s)" autofocus>
        </div>
        <div class="col">
          <input class="form-control" type="text" name="apellido" placeholder="Apellido(s)">
        </div>
      </div>

      <div class="form-group pt-4">
        <input class="form-control" type="email" name="correo" placeholder="Correo Electrónico">
      </div>

      <div class="form-group row pt-4">
        <div class="col">
          <select class="form-select" name="sexo" aria-label="Default select example">
            <option selected>Sexo</option>
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
            <option value="3">Otro</option>
          </select>
        </div>
        <div class="col">
          <input class="form-control" type="number" name="edad" placeholder="Edad" minlength="1" maxlength="3">
        </div>
      </div>

      <div class="form-group row pt-4">
        <div class="col">
          <select class="form-select" name="ocupacion" aria-label="Default select example">
            <option selected>Ocupacion</option>
            <option value="1">Estudio</option>
            <option value="2">Trabajo</option>
            <option value="3">Otro</option>
          </select>
        </div>
        <div class="col">
          <select class="form-select" name="interes" aria-label="Default select example">
            <option selected>¿Qué te gusta más?</option>
            <option value="1">Textos educativos o afines</option>
            <option value="2">Literatura en general</option>
            <option value="3">Literatura antigua</option>
            <option value="4">Literatura moderna</option>
            <option value="5">Otro</option>
          </select>
        </div>
      </div>

      <div class="form-group row pt-5">
        <div class="col">
          <input class="form-control" type="password" name="contra1" placeholder="Contraseña" minlength="4" maxlength="16">
        </div>
        <div class="col">
          <input class="form-control" type="password" name="contra2" placeholder="Repite la contraseña" minlength="4" maxlength="16">

        </div>
      </div>

      <div class="form-group pt-5 pb-4">
        <input class="btn btn-primary" type="submit" name="enviar" value="Regístrate">
      </div>
    </form>
  </div>
</div>

<?php include("includes/footer.php"); ?>