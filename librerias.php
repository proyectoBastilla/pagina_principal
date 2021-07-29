<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<!-- Aquí va todo el código propio de la página -->
<!--Alerta avisando que la página no es para la compra de libros-->
<div class="container-fluid alert alert-secondary text-center mb-3" style="max-width: 1050px;" role="alert">
    Recuerda que puedes contactar con la librería para más información
  </div>

<!--Libros -->
<div class="margen-general">
  <h2>Librerías disponibles</h2>
  <div class="card" style="width: 18rem;">
    <a href="apalibreria">
    <img class="card-img-top" src="https://i.ibb.co/2S3qqqz/libreriamiguel.jpg" alt="Librería Miguel Ángel">
      <div class="card-body">
        <h3 class="card-text">Librería Miguel Ángel</h3>
      </div>
    </a>
  </div>
</div>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
