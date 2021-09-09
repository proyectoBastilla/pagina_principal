<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<main class="main">

  <img src="https://i.ibb.co/PWkH6zD/banner-1.jpg" class="d-block w-100" alt="Banner número 1">

  <!-- Sección podio -->
  <div class="index-section-2">
    <div class="contenedorgrande">
      <h1 class="text-center"><b>TOP MÁS GUSTADOS</b></h1>
      <div class="contenedor">
        <div class="contenedor1">
          <?php
          $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes DESC LIMIT 2";
          $result = mysqli_query($mysql, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="imagen">
              <a href="libros?a=desc&id=<?= $row["id"] ?>">
                <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
              </a>
            </div>
          <?php
          } ?>

          <div class="caja">
            <h3>Puesto 2</h3>
          </div>
        </div>

        <div class="contenedor2">
          <?php
          $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes DESC LIMIT 1";
          $result = mysqli_query($mysql, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="imagen2">
              <a href="libros?a=desc&id=<?= $row["id"] ?>">
                <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
              </a>
            </div>
          <?php
          } ?>

          <div class="caja2">
            <h2>Puesto 1</h2>
          </div>
        </div>

        <div class="contenedor3">
          <?php
          $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes DESC LIMIT 3";
          $result = mysqli_query($mysql, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="imagen3">
              <a href="libros?a=desc&id=<?= $row["id"] ?>">
                <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
              </a>
            </div>
          <?php
          } ?>

          <div class="caja3">
            <h3>Puesto 3</h3>
          </div>
        </div>
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
        <img src="https://i.ibb.co/SR4R0YP/banner-2.jpg" class="d-block w-100" alt="Banner número 2">
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
    <p style="font-size: 18px;">Esta página es una vitrina comercial-pedagógica para el reconocido Pasaje la Bastilla de la ciudad de Medellín,
      más específicamente del Centro Comercial del Libro y la Cultura. ¿Qué significa esto? Significa que esta
      página no se encarga de reproducir ni vender los productos de las librerías aquí expuestas, y, como mencionamos,
      somos una vitrina en la web con el fin de dar mayor visibilidad a este lugar, tan querido por los paisas durante
      generaciones por ser el lugar donde puedes encontrar todo tipo de libros, de todos los precios y con sus diferentes
      ediciones, así como vender los propios para conseguir descuentos en tus próximas compras de libros.<br><br>Así mismo,
      queremos incentivar la lectura, una bella e importante costumbre que se ha ido perdidendo en los últimos años, y
      es ahí a donde pretendemos apuntar, a las generaciones jóvenes; entrando en su principal nicho, la web, para llegar
      con mayor facilidad hasta ellos y mostrarles las cómodas y económicas opciones de buena lectura que tiene dentro
      de su propia ciudad.</p>
  </div>
  <!--Fin texto descripción -->
</main>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>