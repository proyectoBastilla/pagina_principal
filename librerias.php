<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<?php //Aquí va todo el código propio de la página 

//Se obtiene el la página del paginador
$pag = $_GET["pag"];
$pagina = ($pag - 1) * 16;

//Se hace query de todos los libros si no hay búsqueda
$query = "SELECT id, nombre, numLocal, telefono, foto FROM librerias_info LIMIT $pagina,25";
$queryCont = "SELECT COUNT(*) AS contador FROM librerias_info";

$result = mysqli_query($mysql, $query);
?>

<!--librerías -->
<div class="margen-general">
  <!-- Tarjeta general de las librerías -->
  <div class="card">
    <h3 id="libros_titulo">Recorre el pasaje La Bastilla con nosotros </h3>
    <div align="center">
      <!--Google map-->
     
      <div class="margen-general">
    <div align="center">
      <!--Google map-->
      <div class="card">
        <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 600px">
         <iframe id="map-google" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d495.764716496399!2d-75.5665046!3d6.2482134!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44285620849f25%3A0xb81bd00a721b3e1!2sCentro%20Comercial%20del%20Libro%20y%20la%20Cultura!5e0!3m2!1ses-419!2sco!4v1626363860754!5m2!1ses-419!2sco" allow="fullscreen" loading="eager"></iframe>
          </iframe>
          <br></br>
          <a href="acerca#contacto">
          <button type="button" class="btn btn-dark btn-lg btn-block text-center">Escríbenos tu opinión</button></a>
        </div>
        </div>
      <br></br>
      <p>El Pasaje La Bastilla, ubicado en pleno centro, es un referente histórico de la ciudad. Aquí existió el primer café de Medellín como establecimiento de comercio, del cual el pasaje tomó el nombre. Este café inició en 1920 y era un punto de encuentro de los intelectuales de la época, quienes hacían tertulias al calor de una taza de café o de una copa de licor. Sin embargo, este cerró en 1973, pero se quedó en el recuerdo de muchos.</p>
      <br></br>
      <a href="Mapa.php">
          <button type="button" class="btn btn-dark btn-lg btn-block text-center">Conoce más</button></a>
    </div>

</div>
<h3 id="libros_titulo">Conoce las librerías</h3>

    <div class="libros">
      <!-- Tarjetas de cada una de las librerías -->
      <?php while ($row = mysqli_fetch_array($result)) { ?>
        <div class="libros__tarjeta">
          <a href="apalibreria?id=<?= $row["id"] ?>">
            <div class="libros__tarjeta-container">
              <div class="libros__tarjeta-blur"></div>
              <div class="libros__tarjeta-info">
                <h5 class="text-center">Teléfono:</h5>
                <h5 class="text-center"><?= $row["telefono"] ?></h5>
              </div>
              <img class="libros__tarjeta-imagen card-img-top" src="<?= $row["foto"] ?>" alt="Foto de <?= $row["nombre"] ?>">
              <span class="libros__tarjeta-cartel">
                Local <?= $row["numLocal"] ?>
              </span>
            </div>
            <div class="card-body">
              <h5 class="text-start"><?= $row["nombre"] ?></h5>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>

<?php //Trae todo el código del footer a la página principal
include("includes/footer.php"); ?>