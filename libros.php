<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<div class="mx-md-4">
  <br><h2><b>LIBROS</b></h2></br>
</div>

<div class="mx-md-4">
  <div class="card" >
    <div class="mx-sm-4 my-sm-4" >
      <h3 class="card-text"><b>Te podría interesar...</b></h3>
      <div class="card-group">

        <?php
        $query = "SELECT id, titulo, autor, imagen FROM libros";
        $result = mysqli_query($mysql, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
          <a href="descbook.php?id=<?= $row["id"] ?>">
            <div id="tarjeta_libro" class="card">
              <img class="card-img-top" src="<?= $row["imagen"] ?>" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-text"><?= $row["titulo"] ?></h4>
                <p><?= $row["autor"] ?></p>
              </div>
            </div>
          </a>
          <?php } ?>

      </div>
    </div>
  </div>
</div>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
