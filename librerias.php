<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<?php //Aquí va todo el código propio de la página 

//Se obtiene el la página del paginador
$pag = $_GET["pag"];
$pagina = ($pag - 1) * 16;

if (isset($_GET["buscar"])) {
  //Se hace query con búsqueda específica si cumple condición
  $buscar = $_GET["buscar"];
  $query = "SELECT id, nombre, imagen FROM librerias WHERE titulo LIKE '%$buscar%' LIMIT $pagina,25";
  $queryCont = "SELECT COUNT(*) AS contador FROM librerias WHERE titulo LIKE '%$buscar%'";
} else {
  //Se hace query de todos los libros si no hay búsqueda
  $query = "SELECT id, nombre, imagen FROM librerias LIMIT $pagina,25";
  $queryCont = "SELECT COUNT(*) AS contador FROM libros";
}
$result = mysqli_query($mysql, $query);
?>

<!--librerías -->
<div class="margen-general">
  <!-- Tarjeta general de las librerías -->
  <div class="card">
    <div class="mx-sm-4 my-sm-4">
      <h3 id="libros_titulo">Conoce las librerías</h3>
      <div class="libros">
        <!-- Tarjetas de cada una de las librerías -->
        <?php while ($row = mysqli_fetch_array($result)) { ?>
          <div class="libros__tarjetas card">
            <a href="apalibreria?id=<?= $row["id"] ?>">
              <img class="libros__tarjetas-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Foto de <?= $row["nombre"] ?>">
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