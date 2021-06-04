
<?php
include("includes/database.php");
//Inclusión de todo el header con sus links
include("includes/header.php");
?>
<!--Margenes generales del body-->
<div id="margenes" class="text-center">

  <!-- Mensaje emergente si algo fue exitoso (opcional) -->
  <?php if (isset($_SESSION["mensaje"])) { ?>
    <div class="container alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION["mensaje"] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
      //Hacer que siempre se borren las varibles del mensaje emergente
      unset($_SESSION["mensaje"], $_SESSION["mensaje_color"]);
      //Condición para cerrar TODAS las variables de sesión. Para que no se cierre se debe iniciar sesión bien.
      if (!isset($_SESSION["sesion"])) {
        session_unset();
      } ?>
  <?php } ?>
  <!--Selección de login o registro-->
  <h4>Por favor Regístrate o Inicia Sesión:</h4>
  <div class="pt-3">
    <a href="registro_page.php"><button type="button" class="btn btn-secondary">Registro</button></a>
    o
    <a href="login_page.php"><button type="button" class="btn btn-primary">Inicio Sesión</button></a>
  </div>
</div>
<!--Inclusión del footer y sus scripts y links-->
<?php include("includes/footer.php"); ?>
