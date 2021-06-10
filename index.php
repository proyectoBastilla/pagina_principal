<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<div class="mx-md-4">
<br><h1><b>LOGO</b></h1><br>
</div>
<main class="main">
  <div class="containter">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/reloj_arena-banner.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/mapita" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="..." alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="mx-md-4">
      <br><h1><b>¡NUEVOS LANZAMIENTOS!</b></h1>
      <p>Acá aparecen los libros que fueron recientemente añadidos a la pagina desde cualquier libreria, con la intencion de captar 
      la atención del usuario.</p><br>
    </div>
  </div>
</main>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php") ?>
