<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<div id="margen_general">

<?php if (isset($_GET["a"]) && $_GET["a"]=="desc"):

  $id = $_GET["id"];
  $_SESSION["id_libro"] = $id;
  $query = "SELECT * FROM libros WHERE id='$id'";
  $result = mysqli_query($mysql, $query);
  $datos = mysqli_fetch_array($result);

  $id_lib = $datos["libreria"];
  $query_lib = "SELECT nombre FROM librerias WHERE id='$id_lib'";
  $result_lib = mysqli_query($mysql, $query_lib);
  $libreria = mysqli_fetch_array($result_lib);

  if ($datos["disponible"]==1) {
    $disponible = "Disponible";
  } else {
    $disponible = "Agotado";
  }

  if ($datos["uso"]==1) {
    $condicion = "Nuevo";
  } else {
    $condicion = "Usado";
  }

  if (isset($_SESSION["sesion"])) {
    $id_usuario = $_SESSION["id_iniciado"];

    $query_deseo = "SELECT id FROM deseos WHERE libro='$id' AND usuario='$id_usuario'";
    $result_deseo = mysqli_query($mysql, $query_deseo);
    $deseo = mysqli_fetch_array($result_deseo);

    $query_like = "SELECT id FROM likes WHERE libro='$id' AND usuario='$id_usuario'";
    $result_like = mysqli_query($mysql, $query_like);
    $like = mysqli_fetch_array($result_like);
  } ?>

  <div class="container-fluid alert alert-secondary text-center mb-3 mt-3" style="max-width: 1050px;" role="alert">
    Recuerda que para comprar este libro debes dirigirte físicamente hasta el Pasaje la Bastilla, más información en la sección "Mapa"
  </div>
  <div class="container-fluid card mb-3" style="max-width: 1050px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?= $datos["imagen"] ?>" class="img-fluid rounded-start" width="100%">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h1 class="card-title pb-2 float-start"><?= $datos["titulo"] ?></h1>
          <!-- Botón de la lista de deseos -->
          <?php if (isset($_SESSION["sesion"]) && !empty($deseo)): ?>
            <p class="float-end pt-3 pb-3">
              <a href="funciones.php?a=deseo&e=quitar&id=<?= $deseo["id"] ?>">
                Quitar de deseos <i class="fas fa-heart"></i>
              </a>
            </p>
          <?php elseif (isset($_SESSION["sesion"])): ?>
            <p class="float-end pt-3 pb-3">
              <a href="funciones.php?a=deseo&e=agregar">
                Agregar a deseos <i class="far fa-heart"></i>
              </a>
            </p>
          <?php else: ?>
            <span class="float-end pt-3 pb-3" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Debes iniciar sesión">
              Agregar a deseos <i class="far fa-heart"></i>
            </span>
          <?php endif; ?>

          <?php if (isset($_SESSION["sesion"]) && !empty($like)): ?>
            <div class="container-fluid float-start pb-3 px-1 ">
              <?= $datos["likes"] ?> Me gusta <a href="funciones.php?a=dislike&id=<?= $like["id"] ?>"><i class="fas fa-thumbs-up"></i></a>
            </div>
          <?php elseif (isset($_SESSION["sesion"])) : ?>
            <div class="container-fluid float-start pb-3 px-1 ">
              <?= $datos["likes"] ?> Me gusta <a href="funciones.php?a=like"><i class="far fa-thumbs-up"></i></a>
            </div>
          <?php else: ?>
            <div class="container-fluid float-start pb-3 px-1">
              <?= $datos["likes"] ?> Me gusta <i class="far fa-thumbs-up" data-bs-toggle="tooltip" data-bs-placement="top" title="Debes iniciar sesión"></i>
            </div>
          <?php endif; ?>

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
              <td>Fecha de publicación:</td>
              <td><?= $datos["año"] ?></td>
            </tr>
            <tr>
              <td>Librería:</td>
              <td><?= $libreria["nombre"] ?></td>
            </tr>
            <tr>
              <td>Disponibilidad:</td>
              <td><?= $disponible ?></td>
            </tr>
            <tr>
              <td>Condición:</td>
              <td><?= $condicion ?></td>
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

  <div class="card">
    <div class="mx-sm-4 my-sm-4" >
      <h3 id="libros_titulo">Te podría interesar...</h3>
      <center>
        <div id="grupo_libros">

          <?php
          if (isset($_GET["a"]) && $_GET["a"]=="buscar") {
          $buscar = $_POST["buscar"];
          $query = "SELECT id, titulo, autor, imagen FROM libros WHERE titulo LIKE '%$buscar%' LIMIT 8";
          $query2 = "SELECT id, titulo, autor, imagen FROM libros WHERE autor LIKE '%$buscar%' LIMIT 8";
        } else {
          $query = "SELECT id, titulo, autor, imagen FROM libros LIMIT 8";
        }
          $result = mysqli_query($mysql, $query);
          while ($row = mysqli_fetch_array($result)) {
          ?>

          <a href="libros?a=desc&id=<?= $row["id"] ?>">
            <div id="tarjeta_libro" class="card">
              <img id="imagen_libro" class="card-img-top" src="<?= $row["imagen"] ?>" alt="Card image cap">
              <div class="card-body">
                <h4><?= $row["titulo"] ?></h4>
                <p><?= $row["autor"] ?></p>
              </div>
            </div>
          </a>

        <?php }
        if (isset($query2)) {
          $result2 = mysqli_query($mysql, $query2);
          while ($row = mysqli_fetch_array($result2)) {
        ?>
        <a href="libros?a=desc&id=<?= $row["id"] ?>">
          <div id="tarjeta_libro" class="card">
            <img id="imagen_libro" class="card-img-top" src="<?= $row["imagen"] ?>" alt="Card image cap">
            <div class="card-body">
              <h4><?= $row["titulo"] ?></h4>
              <p><?= $row["autor"] ?></p>
            </div>
          </div>
        </a>
      <?php }
        } ?>
        </div>
      </center>
    </div>
  </div>
  <!-- Pasar de página -->
  <nav class="mt-4" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
      </li>
      <li class="page-item"><a class="page-link" href="#" style="color: #757575;">1</a></li>
      <li class="page-item"><a class="page-link" href="#" style="color: #757575;">2</a></li>
      <li class="page-item"><a class="page-link" href="#" style="color: #757575;">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#"><i class="fas fa-angle-double-right" style="color: #424242;";></i></a>
      </li>
    </ul>
  </nav>

<?php endif; ?>
</div>


<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
