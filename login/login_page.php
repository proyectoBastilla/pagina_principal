<?php
//Includes de la conexión a la base de datos y el header
include("includes/database.php");
//Cierra sesión si quiere logearse de nuevo
if (isset($_SESSION["sesion"])) {
  session_unset();
}
include("includes/header.php");
?>

<div id="margenes">
  <?php if (isset($_GET["id"]) && $_GET["id"]=="verifica") { ?>
      <div class="container pb-4">
        <h3>Inicia sesión para completar la verificación de tu cuenta</h3>
      </div>
  <?php } ?>

  <!-- Mensaje emergente sobre un posible error de login (opcional) -->
  <?php if (isset($_SESSION["mensaje"])) { ?>
    <div class="container alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION["mensaje"] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset(); ?>
  <?php } ?>

  <!-- Recuadro específico del login -->
  <div id="tarjeta" class="card card-body">
    <div class="container">
      <p id="texto_tarjeta">Ingresa tus datos</p>
    </div>

    <?php
    if(isset($_GET["id"]) {
      $ir = "$_GET['id'].'.php'";
    } else {
      $ir = "login.php";
    }
    ?>

    <form method="post" action="<?= $ir ?>">
      <div class="form-group pt-4 ">
        <input class="form-control" type="email" name="correo" placeholder="Correo Electrónico" autofocus>
      </div>

      <div class="form-group pt-4">
        <input class="form-control" type="password" name="contra" placeholder="Contraseña">
      </div>

      <div class="form-group pt-5">
        <input class="btn btn-primary" type="submit" name="enviar" value="Iniciar Sesión" >
      </div>
    </form>

  </div>
</div>


<?php include("includes/footer.php") ?>
