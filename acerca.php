<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<!-- Aquí va todo el código propio de la página -->
<div class="margen-general">
  <h1><b>LA BASTILLA</b></h1>
  <h3><b>Esta es la página web para nuestro proyecto de grado.</b></h3>
  <br>
  <h3>Sobre nosotros:</h3>
  <p>Somos una pagina web desarrollada por los estudiantes:<br> Ana Sofía Álvarez Giraldo <br>
   Santiago Villada Ortiz <br> Daniel Correa Botero <br> Juan Pablo Atehortua Orozco <br> Cristian David Hoyos Rodríguez</p>
  <p>Aclaramos que no pertenecemos ni representamos a ninguna librería en particular, somos un grupo de estudiantes que, por el contrario, queremos generar un espacio para reunir las diferentes librerías que componen el conocido Pasaje la Bastilla ubicado en la ciudad de Medellín, Colombia. A través de este medio, tenemos el propósito de incentivar la lectura de todo tipo de libros, apoyando a su vez, los emprendimientos de este lugar, para que tengan más visibilidad en la web y brinden mayor facilidad a sus clientes al momento de buscar los textos que deseen.</p>
  <br>
  <p>Puedes contactarnos en caso de tener algún problema, sugerencia o duda con el funcionamiento o contenido de la página no dudes en dejarla en el formulario de abajo, trataremos de responderte y solucionar el problema a la mayor brevedad.</p>
  <br>

  <!-- Mensaje emergente sobre un posible error de login (opcional) -->
  <?php if (isset($_SESSION["mensaje"])) { ?>
    <div id="mensaje_emergente" class="alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION["mensaje"] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
      //Hacer que siempre se borren las varibles del mensaje emergente
      unset($_SESSION["mensaje"], $_SESSION["mensaje_color"]);
      //Condición para cerrar TODAS las variables de sesión. Para que no se cierre se debe iniciar sesión bien.
      if (!isset($_SESSION["sesion"])) { session_unset(); }
    ?>
  <?php } ?>

  <!-- Form de contacto -->
  <div id="contacto">
    <form class="" action="mail.php?type=contacto" method="post">
      <div class="row pb-4 pt-4">
        <div class="col-md">
          <div class="form-group">

            <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["nombre_iniciado"])) : ?>
              <input class="form-control" type="text" value="<?= $_SESSION["nombre_iniciado"]." ".$_SESSION["apellido_iniciado"] ?>" aria-label="readonly input example" disabled>
            <?php elseif (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["nombre_lib"])) : ?>
              <input class="form-control" type="text" value="<?= "Librería ".$_SESSION["nombre_lib"] ?>" aria-label="readonly input example" disabled>
            <?php else: ?>
              <input type="text" class="form-control" placeholder="Nombre" name="nombre">
            <?php endif; ?>

          </div>
        </div>
        <div class="col-md">
          <div class="form-group">

            <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["correo_iniciado"])) : ?>
              <input class="form-control" type="email" value="<?= $_SESSION["correo_iniciado"] ?>" aria-label="readonly input example" disabled>
            <?php elseif (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["correo_lib"])) : ?>
              <input class="form-control" type="email" value="<?= $_SESSION["correo_lib"] ?>" aria-label="readonly input example" disabled>
            <?php else: ?>
              <input type="email" class="form-control" placeholder="Email" name="correo">
            <?php endif; ?>

          </div>
        </div>
      </div>
      <div class="row pb-4">
        <div class="col-md">
          <div class="form-group">
            <textarea class="form-control" placeholder="Comentarios" style="height: 150px;" name="comentario"></textarea>
          </div>
        </div>
      </div>
      <div class="row pb-4">
        <div class="col-md">
          <div class="form-group text-center">
            <input class="btn btn" style="background: #292b29; color:white;" type="submit" name="enviar" value="Enviar">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
