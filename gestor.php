<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<div class="margen-general">
  <h3>GESTOR DE LIBROS</h3>

  <div class="row pt-2">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Disponibilidad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $id = $_SESSION["id_lib"]; //
            $query = "SELECT id, titulo, autor, año, disponible FROM libros WHERE libreria='$id'";
            $result = mysqli_query($mysql, $query);
            //imprimir la base de datos
            while ($row = mysqli_fetch_array($result)) { ?>
              <tr id="libro-<?= $row["id"] ?>">
                <td><?= $row["titulo"]; ?></td>
                <td><?= $row["autor"]; ?></td>
                <td><?= $row["año"]; ?></td>
                <td>
                  <?php
                    if ($row["disponible"]==1) {
                      echo "Disponible";
                    } else {
                      echo "Agotado";
                    }
                  ?>
                </td>
                <td>
                  <a href="funciones.php?a=cambio&id=<?= $row["id"] ?>" class="btn btn-secondary">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
              </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>
