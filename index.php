<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<main class="main">

  <img src="https://i.ibb.co/PWkH6zD/banner-1.jpg" class="d-block w-100" alt="Banner número 1">

  <div class="index-section-2">
    <!-- Tarjetas lanzamientos -->
 
    <div class="mx-sm-4 my-sm-4">
            <div class="titulo">
                <h1 class="text-center mt-5"><b>TOP LIBROS MÁS GUSTADOS</b></h1>
            </div>
            <div class="libros">
                <?php
                    $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes DESC LIMIT 5";
                    $result = mysqli_query($mysql, $query);
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="libros__tarjeta">
                            <a href="libros?a=desc&id=<?= $row["id"] ?>">
                                <div class="libros__tarjeta-container">
                                    <div class="libros__tarjeta-blur"></div>
                                    <div class="libros__tarjeta-info">
                                        <h5><b>Conoce más</b></h5>
                                        <h5><i class="far fa-thumbs-up"></i> <?= $row["likes"] ?> Likes</h5>
                                    </div>
                                        <img class="libros__tarjeta-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
                                        <span class="libros__tarjeta-cartel">
                                            <h4>¡Ganadores!</h4>
                                        </span>                 
                                    
                                        <div class="card-body">
                                            <h5 class="text-start"><?= $row["titulo"] ?></h5>
                                        </div>
                                </div>
                            </a>
                        </div>
                        <?php 
                        $i++;
                     } ?>
            </div>

        </div>
  </div>
  <!-- Fin de sección podio -->

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
        <a href="libros?pag=1">
      <img src="https://i.ibb.co/HtrMbpm/banner-2.jpg" class="d-block w-100" alt="Banner número 2">
        </a>
        
      </div>
      <div class="carousel-item">
        <img src="https://i.ibb.co/Rv6vZc3/banner-3.jpg" class="d-block w-100" alt="Banner número 3">
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

  <!--Inicio texto descripción -->
  <div class="textoIndex">
    <h1 class="text-center">
      <b>Proyecto La Bastilla</b>
    </h1>
    <p>Esta página es una vitrina comercial para el reconocido Pasaje la Bastilla de la ciudad de Medellín.</p>
    <br>
    <h4 class="text-center">¿Qué significa esto?</h4>
    <p>
      Significa que esta página no se encarga de reproducir ni vender los productos de las librerías aquí expuestas y como mencionamos,
      somos una vitrina en la web con el fin de dar mayor visibilidad a este lugar tan querido por generaciones
      por ser el lugar en donde puedes encontrar todo tipo de libros.
      <br><br>
      Así mismo, queremos incentivar a las ciudadanos
      más jóvenes a la lectura, ya que es una importante costumbre que se ha ido perdiendo con el pasar de los años. 
      Lo haremos por medio de la web, ya que es el medio más utilizado actualmente y así mostrarles las cómodas y económicas
      opciones de lectura.
    </p>
    </div>
  <!--Fin texto descripción -->
</main>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>