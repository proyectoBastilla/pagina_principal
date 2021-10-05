<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<div class="margen-general">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

              <span id="card_title">
                <h3>GESTOR LIBRERÍA</h3>
              </span>

              <div class="float-right">
                <a href="vista-libro?action=agg" class="btn btn-success btn-sm float-right" data-placement="left">
                  Agregar Libro
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead class="thead">
                  <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Año</th>
                    <th>Disponibilidad</th>
                    <th>MODIFÍCALO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $id = $_SESSION["id_lib"]; //
                  $query = "SELECT id, titulo, autor, genero, año, disponible FROM libros WHERE libreria='$id'";
                  $result = mysqli_query($mysql, $query);
                  //imprimir la base de datos
                  while ($row = mysqli_fetch_array($result)) { ?>
                    <tr id="libro-<?= $row["id"] ?>">
                      <td><?= $row["titulo"]; ?></td>
                      <td><?= $row["autor"]; ?></td>
                      <td><?= $row["genero"]; ?></td>
                      <td><?= $row["año"]; ?></td>
                      <td>
                        <?php
                        if ($row["disponible"] == 1) {
                          echo "Disponible";
                        } else {
                          echo "Agotado";
                        }
                        ?>
                      </td>
                      <td>
                        <a href="vista-libro?action=edit&libro=<?=$row["id"]?>" class="btn btn-secondary btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="funciones.php?a=" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include("includes/footer.php") ?>