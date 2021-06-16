<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<!-- Aquí va todo el código propio de la página -->
<div class="mx-md-4">
  <br>
  <h1><b>LA BASTILLA</b></h1>
  <h2><b>Esta es nuestra página web para nuestro proyecto de grado.</b></h2>
  <br>
  <h2>Sobre nosotros:</h2>
  <p>Somos una pagina web desarrollada de forma experimental por los estudiantes:<br> Ana Sofia Alvarez Giraldo <br>
   Santiago Villada Ortiz <br> Daniel Correa Botero <br> Juan Pablo Atehortua <br> Cristian David Hoyos Rodriguez</p>
  <br>
  <!-- Form de contacto -->
  <h4 class="text-center">Apóyanos enviando tus sugerencias y dudas aquí:</h4>
  <div id="contacto">
    <form class="" action="index.html" method="post">
      <div class="row pb-4 pt-4">
        <div class="col-md">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Correo" name="correo">
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
            <input class="btn btn-primary" type="submit" name="enviar" value="Enviar">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
