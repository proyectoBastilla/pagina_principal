<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<div class="mx-md-4">
  <br><h2><b>LIBROS</b></h2></br>
</div>

<?php if (isset($_GET["a"]) && $_GET["a"]=="desc"): ?>

  <!--
  DENTRO DE ESTE IF SE HACE LA DESCRIPCIÓN DE LOS LIBROS
  PARA INGRESAR DIRECTAMENTE Y EVITAR LIOS USEN UNA DE LAS DOS:
  localhost/su_carpeta_local/libros.php?a=desc&id=227
  https://pasajelabastilla.herokuapp.com/libros.php?a=desc&id=227
  SEGÚN DONDE ESTÉN MODIFICANDO
  <3

  PD by Anita: la medida para que quede bien la imagen es 475x580 (en mi opinión) bsos
  -->
  
  <img src= https://www.diariodecultura.com.ar/wp-content/uploads/2020/03/la-peste-albert-camus.jpg width="475" height="580">
  <br></br>
  <h1>La peste</h1>
  <h2>Alberto Soboul</h2>
  <h2>Literatura Clásico</h2>
  <h2>1947</h2>
  <h2><font color="red">Disponible en rojo</h2></font>
  <h3>Sinopsis</h3>
  <p>El narrador se presenta como un testigo de lo ocurrido durante la epidemia de peste que azotó a la ciudad de Orán, siguiendo los pasos de cada uno de los personajes que de una u otra forma estuvieron involucrados en lo que significó la enfermedad para el pueblo. El Doctor Rieux, médico de la ciudad, se sorprende tras la muerte de uno de sus pacientes, consultando a su colega el Dr. Castel. El cuadro clínico además de la aparición paralela de centenares de ratas muertas en las calles de la ciudad alertan a los médicos ante la sospecha de un posible brote de peste bubónica.</p>

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
