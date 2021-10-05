<?php
//Incluye la sesión y la base de datos
include("./includes/database.php");
//Trae todo el código del header a la página principal
include("./includes/header.php");

if ($_GET["action"] == "agg") {
  $title = "Agregar un nuevo libro";
  $button = "Agregar libro";
  $agg = 1;
} elseif ($_GET["action"] == "edit") {
  $title = "Editar libro";
  $button = "Aplicar cambios";
  $edit = 1;

  $id_libro = $_GET["libro"];
  $query = "SELECT * FROM libros WHERE id='$id_libro'";
  $result = mysqli_query($mysql, $query);
  $libro = mysqli_fetch_array($result);
}
?>

<div class="margen-general">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <span class="card-title">
          <h4><?= $title ?></h4>
        </span>
      </div>
      <div class="card-body">

        <?php if (isset($agg)) : ?>
          <form method="POST" action="funciones?a=agglibro" role="form">

            <div class="box box-info padding-1">
              <div class="box-body">

                <div class="form-group">
                  <div class="mb-3 row">
                    <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-8">
                      <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Añade el título del libro">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="autor" class="col-sm-2 col-form-label">Autor</label>
                    <div class="col-sm-8">
                      <input name="autor" type="text" class="form-control" id="autor" placeholder="Añade el autor del libro">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="genero" class="col-sm-2 col-form-label">Género</label>
                    <div class="col-sm-8">
                      <input name="genero" type="text" class="form-control" id="genero" placeholder="Añade un solo género literario que encaje con el libro">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="año" class="col-sm-2 col-form-label">Año publicación</label>
                    <div class="col-sm-8">
                      <input name="año" type="text" class="form-control" id="año" placeholder="Añade el año de publicación. (Acepta siglos como: Siglo VII)">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="disponible" class="col-sm-2 col-form-label">Uso</label>
                    <div class="col-sm-8">
                      <select class="form-select" id="disponible">
                        <option selected>Escoge el uso que ha tenido el libro</option>
                        <option value="1">Nuevo</option>
                        <option value="0">Usado / Segunda Mano</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="sinopsis" class="col-sm-2 col-form-label">Sinópsis</label>
                    <div class="col-sm-8">
                      <textarea name="sinopsis" class="form-control" id="sinopsis" cols="30" rows="5" placeholder="Añade una sinópsis o resumen del libro"></textarea>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-8">
                      <input name="imagen" type="text" class="form-control" id="imagen" placeholder="Usa links externos, no archivos">
                    </div>
                  </div>

                </div>
              </div>
              <div class="box-footer mt-4">
                <button type="submit" class="btn btn-primary"><?= $button ?></button>
              </div>

            </div>
          </form>

        <?php elseif (isset($edit)) : ?>

          <form method="POST" action="funciones?a=editlibro" role="form">

            <div class="box box-info padding-1">
              <div class="box-body">

                <div class="form-group">
                  <div class="mb-3 row">
                    <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-8">
                      <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Cambia el título del libro" value="<?= $libro["titulo"] ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="autor" class="col-sm-2 col-form-label">Autor</label>
                    <div class="col-sm-8">
                      <input name="autor" type="text" class="form-control" id="autor" placeholder="Cambia el autor del libro" value="<?= $libro["autor"] ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="genero" class="col-sm-2 col-form-label">Género</label>
                    <div class="col-sm-8">
                      <input name="genero" type="text" class="form-control" id="genero" placeholder="Cambia a un solo género literario que encaje con el libro" value="<?= $libro["genero"] ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="año" class="col-sm-2 col-form-label">Año publicación</label>
                    <div class="col-sm-8">
                      <input name="año" type="text" class="form-control" id="año" placeholder="Corrige el año de publicación. (Acepta siglos como: Siglo VII)" value="<?= $libro["año"] ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="disponible" class="col-sm-2 col-form-label">Uso</label>
                    <div class="col-sm-8">
                      <select class="form-select" id="disponible">
                        <?php if ($libro["uso"] == 1) : ?>
                          <option>Cambia el uso que ha tenido el libro</option>
                          <option selected value="1">Nuevo</option>
                          <option value="0">Usado / Segunda Mano</option>
                        <?php elseif ($libro["uso"] == 0) : ?> 
                          <option>Cambia el uso que ha tenido el libro</option>
                          <option value="1">Nuevo</option>
                          <option selected value="0">Usado / Segunda Mano</option>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="sinopsis" class="col-sm-2 col-form-label">Sinópsis</label>
                    <div class="col-sm-8">
                      <textarea name="sinopsis" class="form-control" id="sinopsis" cols="30" rows="5" placeholder="Cambia o amplía la sinópsis o resumen del libro"><?= $libro["sinopsis"] ?></textarea>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-8">
                      <input name="imagen" type="text" class="form-control" id="imagen" placeholder="Cambia el link externo de la imagen, no archivos" value="<?= $libro["imagen"] ?>">
                    </div>
                  </div>

                </div>
              </div>
              <div class="box-footer mt-4">
                <button type="submit" class="btn btn-primary"><?= $button ?></button>
              </div>

            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php include('./includes/footer.php'); ?>