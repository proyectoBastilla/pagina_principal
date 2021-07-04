<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<div class="mx-md-4">
  <br><h2><b>LIBROS</b></h2></br>
</div>

<?php if (isset($_GET["a"]) && $_GET["a"]=="desc"): ?>

  <!--
  PD by Anita: la medida para que quede bien la imagen es 475x580 (en mi opinión) bsos
  -->

  <?php
  $id = $_GET["id"];

  $query = "SELECT * FROM libros WHERE id='$id'";
  $result = mysqli_query($mysql, $query);
  $datos = mysqli_fetch_array($result);

  if ($datos["disponible"]==1) {
    $disponible = "Disponible";
  } else {
    $disponible = "Agotado";
  }
  ?>
  <div class="container-fluid card mb-3" style="max-width: 1050px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?= $datos["imagen"] ?>" class="img-fluid rounded-start" width="95%">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h1 class="card-title pb-3"><?= $datos["titulo"] ?></h1>
          <table class="table table-striped table-hover">
            <tr>
              <td>Autor:</td>
              <td><?= $datos["autor"] ?></td>
            </tr>
            <tr>
              <td>Género:</td>
              <td><?= $datos["genero"] ?></td>
            </tr>
            <tr>
              <td>Año de publicación:</td>
              <td><?= $datos["año"] ?></td>
            </tr>
            <tr>
              <td>Sinopsis:</td>
              <td><?= $datos["sinopsis"] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <div class="mx-md-4">
    <div class="card" >
      <div class="mx-sm-4 my-sm-4" >
        <h3 class="card-text"><b>Te podría interesar...</b></h3>
        <div class="card-group">

          <?php

          if (isset($_GET["a"]) && $_GET["a"]=="buscar") {
            $buscar = $_POST["buscar"];
            $query = "SELECT id, titulo, autor, imagen FROM libros WHERE titulo LIKE '%$buscar%'";
            $query2 = "SELECT id, titulo, autor, imagen FROM libros WHERE autor LIKE '%$buscar%'";
          } else {
            $query = "SELECT id, titulo, autor, imagen FROM libros";
          }

          $result = mysqli_query($mysql, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <a href="libros.php?a=desc&id=<?= $row["id"] ?>">
              <div id="tarjeta_libro" class="card">
                <img class="card-img-top" src="<?= $row["imagen"] ?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-text"><?= $row["titulo"] ?></h4>
                  <p><?= $row["autor"] ?></p>
                </div>
              </div>
            </a>
          <?php }
          if (isset($query2)) {
            $result2 = mysqli_query($mysql, $query2);
            while ($row = mysqli_fetch_array($result2)) {
          ?>
              <a href="libros.php?a=desc&id=<?= $row["id"] ?>">
                <div id="tarjeta_libro" class="card">
                  <img class="card-img-top" src="<?= $row["imagen"] ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-text"><?= $row["titulo"] ?></h4>
                    <p><?= $row["autor"] ?></p>
                  </div>
                </div>
              </a>
            <?php }
          } ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
