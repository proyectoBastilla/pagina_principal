<?php
//Includes de la conexión a la base de datos y el header
include("includes/database.php");
//Cierra sesión si quiere logearse de nuevo
if (isset($_SESSION["sesion"])) {
  session_unset();
}
//Incluye LUEGO del if anterior el header
include("includes/header.php");

//Asigna el nombre del archivo al que irá el form
if(isset($_GET["id"])) {
  $ir = "funciones.php?a=".$_GET["id"];
} else {
  $ir = "funciones.php?a=login";
}

//Asigna el nombre que tendrá el botón para enviar el form
if (isset($_GET["id"])) {

  if ($_GET["id"]=="verifica") {
    $enviar = "Verifica tu cuenta";
  } elseif ($_GET["id"]=="restablecer") {
    $enviar = "Restablece tu contraseña";
  } elseif ($_GET["id"]=="edit") {
    $enviar = "Enviar correo";
  }
} else {
  $enviar = "Iniciar Sesión"; //Si no hay nada es un login normal
}
?>

<div class="margenes-login">
<!-- Mensaje emergente sobre un posible error de login (opcional) -->
  <?php if (isset($_SESSION["mensaje"])) { ?>
    <div class="container alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION["mensaje"] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset(); ?>
  <?php } ?>

  <!-- Texto que está arriba del form indicando que hacer -->
  <div class="card card-body">
    <?php if (isset($_GET["id"]) && $_GET["id"]=="verifica") { ?>
      <div class="container pb-4 pt-4">
        <p class="text-center">Inicia sesión para completar la verificación de tu cuenta</p>
      </div>
    <?php } elseif (isset($_GET["id"]) && $_GET["id"]=="edit") { ?>
      <div class="container pb-4 pt-4">
        <p class="text-center">Ingresa tu correo registrado</p>
      </div>
    <?php } elseif (isset($_GET["id"]) && $_GET["id"]=="restablecer") { ?>
      <div class="container pb-4 pt-4">
        <p class="text-center">Ingresa tu correo y escribe tu nueva contraseña</p>
      </div>
    <?php } else { ?>
      <div class="container pt-4">
        <p class="text-center">Ingresa tus datos</p>
      </div>
    <?php } ?>

    <!-- Formulario que envía datos a un archivo definido en la línea 11-15 -->
    <form method="post" action="<?= $ir ?>">

      <!-- Si olvidó contraseña, solo un campo para mandar correo de recuperación -->
      <?php if (isset($_GET["id"]) && $_GET["id"]=="edit"): ?>
        <div class="form-group pt-4 ">
          <input class="form-control" type="email" name="correo" placeholder="Correo Electrónico" autofocus>
        </div>
        <div class="form-group pt-5">
          <input class="btn btn-primary" type="submit" name="enviar" value="<?= $enviar ?>" >
        </div>
      </form>
      <?php else: ?>
        <!-- Esto es para cualquier otro tipo de acción -->
        <div class="form-group pt-4 ">
          <input class="form-control" type="email" name="correo" placeholder="Correo Electrónico" autofocus>
        </div>

        <div class="form-group pt-4">
          <input class="form-control" type="password" name="contra" placeholder="Contraseña">
        </div>
        <!-- Por si hay que restablecer, se agrega otro campo para repetir la contraseña -->
        <?php if (isset($_GET["id"]) && $_GET["id"]=="restablecer") { ?>
          <div class="form-group pt-4">
            <input class="form-control" type="password" name="contra2" placeholder="Repite tu contraseña">
          </div>
        <?php } ?>

        <div class="form-group pt-5">
          <input class="btn btn-dark" type="submit" name="enviar" value="<?= $enviar ?>" >
        </div>
      </form>
      <?php endif; ?>

    <!-- Botón para restablecer contraseña si es un login normal -->
    <?php if (!isset($_GET["id"])): ?>
      <div class="container pt-4 pb-4">
        <a id="link_recuperar" href="login?id=edit">¿Olvidaste tu contraseña?</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Include del footer y scripts -->
<?php include("includes/footer.php") ?>
