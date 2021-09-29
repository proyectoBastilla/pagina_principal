<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<main class="main">

  <img src="https://i.ibb.co/PWkH6zD/banner-1.jpg" class="d-block w-100" alt="Banner número 1">

  <!-- Sección podio 
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

-->
  <div class="index-section-2">
  <div class="containerpodio">
    <div class="dos">
      <div class="podiodos"><h1>2° PUESTO</h1></div>
        <div class="imagendos">
                <?php
                    $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes ASC LIMIT 2";
                $result = mysqli_query($mysql, $query);
                for ($i=0; $i < 1; $i++) {
                    $row = mysqli_fetch_array($result);
                ?>
                    <div class="elemento2">
                    <a href="libros?a=desc&id=<?= $row["id"] ?>">
                        <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
                    </a>
                    </div>
                <?php
                } ?>
         </div>    
    </div>
    <div class="uno-">
      <div class="podiouno"><h1>1° PUESTO</h1></div>
      <div class="imagenuno">
      <?php
          $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes DESC LIMIT 1";
          $result = mysqli_query($mysql, $query);
          for ($i = 0; $i < 1; $i++) {
            $row = mysqli_fetch_array($result);
          ?>
            <div class="elemento3">
              <a href="libros?a=desc&id=<?= $row["id"] ?>">
                <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
              </a>
            </div>
          <?php
          } ?>
      </div>
    </div>
    <div class="tres">
      <div class="podiotres"><H1>3° PUESTO</H1></div>
      <div class="imagentres">
      <?php
          $query = "SELECT id, titulo, autor, imagen, likes FROM libros ORDER BY likes ASC LIMIT 3";
          $result = mysqli_query($mysql, $query);
          for ($i = 0; $i < 1; $i++) {
            $row = mysqli_fetch_array($result);
          ?>
            <div class="elemento4">
              <a href="libros?a=desc&id=<?= $row["id"] ?>">
                <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
              </a>
            </div>
          <?php
          } ?>
      </div>
    </div>
    <div class="titulo"><h1 class="text-center"><b>TOP MÁS GUSTADOS</b></h1></div>
  </div>




    <style>
      .containerpodio {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 0.2fr 1.6fr 1fr;
  gap: 20px 30px;
  grid-auto-flow: row;
  grid-template-areas:
    "titulo titulo titulo"
    "dos uno- tres"
    "dos uno- tres";
}

.dos {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr 1.5fr 0.5fr;
  gap: 0px 0px;
  grid-auto-flow: row;
  grid-template-areas:
    "imagendos imagendos imagendos"
    "imagendos imagendos imagendos"
    "podiodos podiodos podiodos";
  grid-area: dos;
}

.podiodos { grid-area: podiodos; 
  color:#f5f5f5;
  display:flex;
  align-items:center;
  justify-content:center;
  font-family: 'Quicksand';
  background: rgb(140,154,155);
  text-align: center;
  font-size: 25px;
  border-radius: 7%;
  height: 60px;
  margin-top:4px;
  }

.imagendos { grid-area: imagendos; }
.imagendos:hover{
      transform: translateY(-15px);;
}
.uno- {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr 1.3fr 0.7fr;
  gap: 0px 0px;
  grid-auto-flow: row;
  grid-template-areas:
    "imagenuno imagenuno imagenuno"
    "imagenuno imagenuno imagenuno"
    "podiouno podiouno podiouno";
  grid-area: uno-;
}

.podiouno { grid-area: podiouno; 
  color:#f5f5f5;
  display:flex;
  align-items:center;
  justify-content:center;
  font-family: 'Quicksand';
  margin-bottom: 0px;
  background: rgb(241,182,42);
  text-align: center;
  font-size: 25px;
  border-radius: 7%;
  height: 80px;
  margin-top: 32px;
}

.imagenuno { grid-area: imagenuno; }
.imagenuno:hover{
      transform: translateY(-15px);;
}
.tres {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr 1.6fr 0.4fr;
  gap: 0px 0px;
  grid-auto-flow: row;
  grid-template-areas:
    "imagentres imagentres imagentres"
    "imagentres imagentres imagentres"
    "podiotres podiotres podiotres";
  grid-area: tres;
}

.podiotres { grid-area: podiotres; 
  color:#f5f5f5;
  display:flex;
  align-items:center;
  justify-content:center;
  font-family: 'Quicksand';
  background: rgb(232,138,74);
  text-align: center;
  font-size: 25px;
  border-radius: 7%;
  height: 46px;
}

.imagentres { grid-area: imagentres; }
.imagentres:hover{
      transform: translateY(-15px);;
}
.titulo { grid-area: titulo;}
@media screen and (max-width: 360px) {
  .containerpodio {
display: grid;
grid-template-columns: 1fr 1fr 0.9fr 1.1fr;
grid-template-rows: 0.2fr 1.8fr 1.2fr;
gap: 10px 20px;
grid-auto-flow: row;
grid-template-areas:
  "titulo titulo titulo titulo"
  ". uno- uno- ."
  "dos dos tres tres";
width: 300px;
}

.titulo { grid-area: titulo; }

.uno- {
display: grid;
grid-template-columns: 1fr 1fr 1fr;
grid-template-rows: 0.1fr 0.4fr 0.6fr;
gap: 0px 40px;
grid-auto-flow: row;
grid-template-areas:
  "imagenuno imagenuno imagenuno"
  "imagenuno imagenuno imagenuno"
  "podiouno podiouno podiouno";
grid-area: uno-;
}

.imagenuno { grid-area: imagenuno; }

.podiouno { grid-area: podiouno; }

.tres {
display: grid;
grid-template-columns: 1fr 1fr 1fr;
grid-template-rows: 1fr 1.6fr 0.4fr;
gap: 0px 0px;
grid-auto-flow: row;
grid-template-areas:
  "imagentres imagentres imagentres"
  "imagentres imagentres imagentres"
  "podiotres podiotres podiotres";
grid-area: tres;
}

.podiotres { grid-area: podiotres; }

.imagentres { grid-area: imagentres; }

.dos {
display: grid;
grid-template-columns: 1fr 1fr 1fr;
grid-template-rows: 1fr 1.4fr 0.6fr;
gap: 0px 0px;
grid-auto-flow: row;
grid-template-areas:
  "imagendos imagendos imagendos"
  "imagendos imagendos imagendos"
  "podiodos podiodos podiodos";
grid-area: dos;
}

.podiodos { grid-area: podiodos; }

.imagendos { grid-area: imagendos; }

}

    </style>
  </div>
  <!-- Fin de sección podio -->
<br></br>
<br></br>
<br></br>
<br></br>
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