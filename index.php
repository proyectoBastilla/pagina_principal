<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<!-- Aquí va todo el código propio de la página -->
<div class="mx-md-4">
<br><h1><b>LOGO</b></h1><br>
</div>

<main class="main">
  <div class="containter">
    <!-- Inicio Carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <!-- Botones inferiores Carrusel -->
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <!-- Imágenes Carrusel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/reloj_arena-banner.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/cuphead-banner.jpg" class="d-block w-100">
        </div>
      </div>
      <!-- Botones laterales Carrusel -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Fin Carrusel -->

    <!-- Sección lanzamientos -->
    <div class="mx-md-4">
      <br><h1><b>¡NUEVOS LANZAMIENTOS!</b></h1></br>
      <!-- Tarjetas lanzamientos -->
      <div class="card-columns">
        <div class="card-group">

        <?php
        $query = "SELECT id, titulo, autor, imagen FROM libros";
        $result = mysqli_query($mysql, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
          <a href="libros.php?a=desc&id=<?= $row["id"] ?>">
            <div id="tarjeta_libro" class="card">
              <img class="card-img-top" src="<?= $row["imagen"] ?>" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-text"><?= $row["titulo"] ?></h2>
                <p><?= $row["autor"] ?></p>
              </div>
            </div>
          </a>
          <?php } ?>

        </div>
      </div>
    </div>
    <!-- Fin de sección lanzamientos -->
  </div>
</main>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
