<?php
//Incluye la sesión y la base de datos
include("./includes/database.php");
//Trae todo el código del header a la página principal
include("./includes/header.php");

if ($_GET["action"] == "agg") {
  $title = "Agregar un nuevo libro";
  $button = "Agregar libro";
  $agg;
} elseif ($_GET["action"] == "edit") {
  $title = "Editar libro";
  $button = "Aplicar cambios";
  $edit;
}
?>


<div class="margen-general">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <span class="card-title"><?= $title ?></span>
      </div>
      <div class="card-body">
        <form method="POST" action="" role="form">

          <div class="box box-info padding-1">
            <div class="box-body">

              <div class="form-group">
                <div class="mb-3 row">
                  <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="titulo">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="autor" class="col-sm-2 col-form-label">Autor</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="autor">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="genero" class="col-sm-2 col-form-label">Género</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="genero">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="año" class="col-sm-2 col-form-label">Año publicación</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="año">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="disponible" class="col-sm-2 col-form-label">Disponibilidad</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="disponible">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="sinopsis" class="col-sm-2 col-form-label">Sinópsis</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="sinopsis">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="imagen">
                  </div>
                </div>

              </div>
            </div>
            <div class="box-footer mt20">
              <button type="submit" class="btn btn-primary"><?= $button ?></button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>