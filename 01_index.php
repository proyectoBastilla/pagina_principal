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
      <div class="card" class="style1_card" style="width: 18rem;">
        <img class="card-img-top" src="https://www.diariodecultura.com.ar/wp-content/uploads/2020/03/la-peste-albert-camus.jpg" alt="Card image cap">
         <div class="card-body">
         <h2><p class="card-text">La peste </p></h2>
         <p> Albert Camus </p>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://www.librosambigu.com/static/img/portadas/la-revolucion-francesa_60812.jpg" alt="Card image cap">
         <div class="card-body">
         <h2><p class="card-text">La revolución francesa</p></h2>
         <p> Albert Soboul </p>
        </div>
      </div>
      <div class="card" class="style1_card" style="width: 18rem;">
        <img class="card-img-top" src="https://www.planetadelibros.com.co/usuaris/libros/fotos/164/m_libros/que-tiene-ella-que-no-tenga-yo_9789584232618.jpg" alt="Card image cap">
         <div class="card-body">
         <h2><p class="card-text">¿Qué tiene ella que no tenga yo? </p></h2>
         <p> Alberto Linero </p>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://http2.mlstatic.com/cuentos-para-quererte-mejor-alex-rovira-D_NQ_NP_677963-MCO41879997884_052020-O.webp" alt="Card image cap">
         <div class="card-body">
         <h2><p class="card-text">Cuentos para quererte mejor</p></h2>
         <p> Alex Rovira </p>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://http2.mlstatic.com/la-ultima-escala-del-tramp-steamer-mutis-el-tiempo-D_NQ_NP_825011-MCO25913425027_082017-F.webp" alt="Card image cap">
         <div class="card-body">
         <h2><p class="card-text">La última escala del Tramp Steamer </p></h2>
         <p> Alvaro Mutis </p>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://lasillarotarm.blob.core.windows.net/images/2018/03/07/cosasquepiensascuandotemuerdeslasunas.jpg" alt="Card image cap">
         <div class="card-body">
         <h2><p class="card-text">Cosas que piensas cuando te muerdes las uñas</p></h2>
         <p> Amalia Andrade </p>
        </div>
      </div>
      
  </div>
  </div>  

      
     </div>
  </div>
</main>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
