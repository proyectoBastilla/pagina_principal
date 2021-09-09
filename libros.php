<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<div class="margen-general">

  <?php //SI SE OBTIENE POR GET, QUE SE MOSTRARÁ LA DESCRIPCIÓN DE ALGÚN LIBRO...
  if (isset($_GET["a"]) && $_GET["a"] == "desc") :

    //Toma el ID del libro en cuestión y busca su info en base de datos
    $id = $_GET["id"];
    $_SESSION["id_libro"] = $id;
    $query = "SELECT * FROM libros WHERE id='$id'";
    $result = mysqli_query($mysql, $query);
    $datos = mysqli_fetch_array($result);

    //Traduce el id de la librería en su nombre como tal
    $id_lib = $datos["libreria"];
    $query_lib = "SELECT nombre FROM librerias WHERE id='$id_lib'";
    $result_lib = mysqli_query($mysql, $query_lib);
    $libreria = mysqli_fetch_array($result_lib);

    //Traduce la disponibilidad de 0 o 1 a texto
    if ($datos["disponible"] == 1) {
      $disponible = "Disponible";
    } else {
      $disponible = "Agotado";
    }
    //Lo mismo de arriba con la condición del libro
    if ($datos["uso"] == 1) {
      $condicion = "Nuevo";
    } else {
      $condicion = "Usado";
    }

    //Si el usuario ha iniciado sesión, query para saber si ha dado like o deseo
    if (isset($_SESSION["sesion"])) {
      $id_usuario = $_SESSION["id_iniciado"];

      $query_deseo = "SELECT id FROM deseos WHERE libro='$id' AND usuario='$id_usuario'";
      $result_deseo = mysqli_query($mysql, $query_deseo);
      $deseo = mysqli_fetch_array($result_deseo);

      $query_like = "SELECT id FROM likes WHERE libro='$id' AND usuario='$id_usuario'";
      $result_like = mysqli_query($mysql, $query_like);
      $like = mysqli_fetch_array($result_like);
    } ?>

    <!-- Alerta avisando que la página no es para la compra de libros -->
    <div class="container-fluid alert alert-secondary text-center mb-3" style="max-width: 1050px;" role="alert">
      Recuerda que para comprar este libro debes dirigirte físicamente hasta el Pasaje la Bastilla, más información "<a id="link-libro" href="mapa">aquí</a>"
    </div>

    <!-- Tarjeta general libro -->
    <div class="container-fluid card mb-3" style="max-width: 1050px;">
      <div class="row g-0">
        <div class="col-md-4 mt-3 mb-3">
          <img src="<?= $datos["imagen"] ?>" class="img-fluid rounded-start" width="100%" alt="Portada libro">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h1 class="card-title pb-2 float-start"><?= $datos["titulo"] ?></h1>

            <!-- Botón de la lista de deseos -->
            <?php //Si lo tiene agg a deseos...
            if (isset($_SESSION["sesion"]) && !empty($deseo)) : ?>
              <p class="float-end p-3">
                <a href="funciones.php?a=deseo&e=quitar&id=<?= $deseo["id"] ?>">
                  Quitar de deseos <i class="fas fa-heart"></i>
                </a>
              </p>
            <?php //Si no lo tiene agg a deseos...
            elseif (isset($_SESSION["sesion"])) : ?>
              <p class="float-end p-3">
                <a href="funciones.php?a=deseo&e=agregar">
                  Agregar a deseos <i class="far fa-heart"></i>
                </a>
              </p>
            <?php else : //Si no ha iniciado sesión aparece un tooltip 
            ?>
              <span class="float-end p-3" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Debes iniciar sesión">
                Agregar a deseos <i class="far fa-heart"></i>
              </span>
            <?php endif; ?>


            <?php //Mismo proceso de arriba con los deseos, ahora con el like
            if (isset($_SESSION["sesion"]) && !empty($like)) : ?>
              <div class="container-fluid float-start pb-3 px-1 ">
                <?= $datos["likes"] ?> Me gusta <a href="funciones.php?a=dislike&id=<?= $like["id"] ?>"><i class="fas fa-thumbs-up"></i></a>
              </div>
            <?php elseif (isset($_SESSION["sesion"])) : ?>
              <div class="container-fluid float-start pb-3 px-1 ">
                <?= $datos["likes"] ?> Me gusta <a href="funciones.php?a=like"><i class="far fa-thumbs-up"></i></a>
              </div>
            <?php else : ?>
              <div class="container-fluid float-start pb-3 px-1">
                <?= $datos["likes"] ?> Me gusta <i class="far fa-thumbs-up" data-bs-toggle="tooltip" data-bs-placement="top" title="Debes iniciar sesión"></i>
              </div>
            <?php endif; ?>

            <!-- Toda la info del libro en una tabla -->
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

  <?php else : //SI NO ES LO ANTERIOR, SE MUESTRAN TODOS LOS LIBROS 
  ?>

    <?php
    //Se obtiene el la página del paginador
    $pag = $_GET["pag"];
    $pagina = ($pag - 1) * 30;

    if (isset($_GET["buscar"])) {
      //Se hace query con búsqueda específica si cumple condición
      $buscar = $_GET["buscar"];
      $query = "SELECT libros.id, libros.titulo, libros.autor, libros.imagen, libros.likes, libros.disponible, librerias.nombre FROM libros INNER JOIN librerias ON libros.libreria = librerias.id WHERE libros.titulo LIKE '%$buscar%' LIMIT $pagina,30";
      $queryCont = "SELECT COUNT(*) AS contador FROM libros WHERE titulo LIKE '%$buscar%'";
    } else {
      //Se hace query de todos los libros si no hay búsqueda
      $query = "SELECT libros.id, libros.titulo, libros.autor, libros.imagen, libros.likes, libros.disponible, librerias.nombre FROM libros INNER JOIN librerias ON libros.libreria = librerias.id LIMIT $pagina,30";
      $queryCont = "SELECT COUNT(*) AS contador FROM libros";
    }
    $result = mysqli_query($mysql, $query);
    ?>
    <!-- Tarjeta general de los libros -->
    <div class="card">
        <h3 id="libros_titulo">Te podría interesar...</h3>
        <div class="libros">
          <!-- Tarjetas de cada uno de los libros -->
          <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="libros__tarjeta">
              <a href="libros?a=desc&id=<?= $row["id"] ?>">
                <div class="libros__tarjeta-container">
                  <div class="libros__tarjeta-blur"></div>
                  <div class="libros__tarjeta-info">
                    <h5 class="text-center"><?= $row["autor"] ?></h5>
                    <h5 class="text-center"><?= $row["nombre"] ?></h5>
                    <h5><i class="far fa-thumbs-up"></i> <?= $row["likes"] ?> Likes</h5>
                  </div>
                  <img class="libros__tarjeta-imagen card-img-top" src="<?= $row["imagen"] ?>" alt="Portada libro">
                  <span class="libros__tarjeta-cartel">
                    <?php if($row["disponible"]==1) {
                      echo "Disponible";
                    } else {
                      echo "Agotado";
                    } ?>
                  </span>
                </div>
                <div class="card-body">
                  <h6 class="text-start"><?= $row["titulo"] ?></h6>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
    </div>

    <?php
    //Toma el resultado del contador de libros de arriba
    $resultCont = mysqli_query($mysql, $queryCont);
    $libros1 = mysqli_fetch_array($resultCont);
    $totalLibros = $libros1["contador"];
    //Define cuantas páginas mostrará el paginador
    $numPags = ceil($totalLibros / 30);
    ?>

    <!-- Paginador -->
    <nav class="mt-4" aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($pag == 1) {echo "disabled";} ?>">
          <a class="page-link text-dark" href="libros?<?php if (isset($_GET["buscar"])) {echo "buscar=$buscar";} ?>&pag=<?= ($pag - 1) ?>"><i class="fas fa-angle-double-left"></i></a>
        </li>
        <?php $i = 1; ?>
        <?php while ($i <= $numPags) { ?>
          <li class="page-item">
            <a class="page-link text-dark" href="libros?<?php if (isset($_GET["buscar"])) {echo "buscar=$buscar";} ?>&pag=<?= $i ?>"><?= $i ?></a>
          </li>
          <?php $i++; ?>
        <?php } ?>
        <li class="page-item <?php if (($i - 1) == $pag) {echo "disabled";} ?>">
          <a class="page-link text-dark" href="libros?<?php if (isset($_GET["buscar"])) {echo "buscar=$buscar";} ?>&pag=<?= ($pag + 1) ?>"><i class="fas fa-angle-double-right"></i></a>
        </li>
      </ul>
    </nav>

  <?php endif; ?>

</div>


<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>