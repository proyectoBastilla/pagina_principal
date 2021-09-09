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