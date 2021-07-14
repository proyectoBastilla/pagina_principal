<!-- Incluye la sesión y la base de datos -->
<?php include("includes/database.php"); ?>
<!-- Trae todo el código del header a la página principal -->
<?php include("includes/header.php"); ?>

<!-- Aquí va todo el código propio de la página -->
<div id="margen_general">
  <h2>Librerías disponibles</h2>
  <div class="card" style="width: 18rem;">
    <a href="libros.php">
    <img class="card-img-top" src="img/libreriamiguel.jpg">
      <div class="card-body">
        <h3 class="card-text">Librería Miguel Ángel</h3>
      </div>
    </a>
  </div>
</div>
<a class="gotopbtn" href="#"><i class="fas fa-arrow-up" style="position: fixed; width: 50px;
  height: 50px;
  background: #424242;
  bottom: 40px;
  right: 50px;
  text-decoration: none;
  text-align: center;
  line-height: 50px;
  color:white ;
  font-size: 22px;
  border-radius: 10px"
  ></i></a>
<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
