<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>
<!--Alerta avisando que la página no es para la compra de libros-->

<?php
$id = $_GET["id"];
$query = "SELECT * from librerias_info WHERE id='$id'";
$result = mysqli_query($mysql, $query);
$libreria = mysqli_fetch_array($result);
?>

<div class="container-fluid alert alert-secondary text-center mb-3 mt-3" style="max-width: 1050px;" role="alert">
  Recuerda que puedes contactar con la librería para más información
</div>

<div class="container-fluid card mb-3" style="max-width: 1050px;">
  <div class="row g-0">
    <div class="col-md-4 mt-3 mb-3">
      <img src="<?= $libreria["foto"] ?>" class="img-fluid rounded-start" width="100%" alt="Foto librería">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title pb-2 float-start"><?= $libreria["nombre"] ?></h1>
        <table class="table table-striped table-hover">
          <tr>
            <td>Dueño:</td>
            <td><?= $libreria["dueño"] ?></td>
          </tr>
          <tr>
            <td>Descripción:</td>
            <td><?= $libreria["descripcion"] ?></td>
          </tr>
          <tr>
            <td>Local:</td>
            <td><?= $libreria["numLocal"] ?></td>
          </tr>
          <tr>
            <td>Teléfono:</td>
            <td><?= $libreria["telefono"] ?></td>
          </tr>
          <?php if (!empty($libreria["instagram"])) : ?>
            <tr>
              <td>Instagram:</td>
              <td><?= $libreria["instagram"] ?></td>
            </tr>
          <?php endif; ?>
          <?php if (!empty($libreria["facebook"])) : ?>
            <tr>
              <td>Facebook:</td>
              <td><?= $libreria["facebook"] ?></td>
            </tr>
          <?php endif; ?>
          <tr>
        </table>
      </div>
    </div>
  </div>
</div>











<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>