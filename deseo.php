<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<?php
$id_usuario = $_SESSION["id_iniciado"];
$query_deseos = "SELECT libro FROM deseos WHERE usuario='$id_usuario'";
$result_deseos = mysqli_query($mysql, $query_deseos);
$result = mysqli_query($mysql, $query_deseos);
$deseo = mysqli_fetch_array($result);
?>

<div class="margen-general">

  <?php if (empty($deseo)): ?>

    <h2>No hay nada por aquí...</h2>
    <br><br>
    <h4>Agrega libros a tu lista de deseos para verlos en esta sección</h4>
    <a href="libros"><h4>Click aquí para ir a los libros</h4></a>

  <?php else: ?>

    <div class="row row-cols-1 row-cols-md-2 g-4">

    <?php while ($libro_array = mysqli_fetch_array($result_deseos)) {

      $libro = $libro_array["libro"];
      $query_datos = "SELECT titulo, autor, libreria, imagen FROM libros WHERE id='$libro'";
      $result_datos = mysqli_query($mysql, $query_datos);

      while ($datos = mysqli_fetch_array($result_datos)) {

        $id_lib = $datos["libreria"];
        $query_lib = "SELECT nombre FROM librerias WHERE id='$id_lib'";
        $result_lib = mysqli_query($mysql, $query_lib);
        $libreria = mysqli_fetch_array($result_lib);
      ?>
        <div class="col">
          <div class="card mb-3" style="max-width: 540px;">
            <a href="libros?a=desc&id=<?= $libro ?>">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="<?= $datos["imagen"] ?>" class="img-fluid rounded-start" width="100%">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?= $datos["titulo"] ?></h5>
                    <p class="card-text"><?= $datos["autor"] ?></p>
                    <p class="card-text"><small class="text-muted"><?= $libreria["nombre"] ?></small></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
    <?php } ?>
  <?php } ?>
    </div>

  <?php endif; ?>


</div>

<?php include("includes/footer.php") ?>
