<!DOCTYPE html>
<!-- Pongo "es" para que la página sea tratada en español -->
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pasaje La Bastilla. Todos tus libros, un solo sitio.</title>
  <meta name="description" content="Encuentra tus libros y librerías favoritas en un solo lugar, con los mejores precios que te ofrece El Pasaje la Bastilla. Visítanos y dale paso a tu amor por la lectura.">
  <!-- Link del favicon -->
  <link rel="shortcut icon" href="https://i.ibb.co/yYJTtQS/favicon.png">
  <!-- Link con BOOTSTRAP 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- Link con Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Link a estilo CSS -->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <header>
    <div class="header" id="myTopnav">
      <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars fa-2x"></i></a>
      <?php //Esto es mientras sale el nuevo logo 
      ?>
      <a href="index" class="header__nav-item">Inicio</a>
      <a href="libros?pag=1" class="header__nav-item">Libros</a>
      <a href="librerias" class="header__nav-item">Librerías</a>
      <a href="mapa" class="header__nav-item">Mapa</a>
      <a href="acerca" class="header__nav-item">Acerca de</a>

      <div class="header__right">
        <!-- Búsqueda -->
        <div class="header__nav-item search">
          <form action="funciones.php?a=buscar" method="get">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Búsqueda" type="search" name="buscar">
              <button id="buscar-btn" class="btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>
        <!-- Botón deseos -->
        <?php if (isset($_SESSION["sesion"])) : ?>
          <div class="header__nav-item deseos-btn">
            <a href="deseo?pag=1">
              <i class="far fa-heart"></i>
              <p>Deseos</p>
            </a>
          </div>
        <?php else : ?>
          <div class="header__nav-item deseos-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Debes iniciar sesión">
            <i class="far fa-heart"></i>
            <p>Deseos</p>
          </div>
        <?php endif; ?>
  
        <div class="header__nav-item login-btn">
          <i class="far fa-user"></i>
          <p>Login</p>
          <ul class="login-btn__desp">
            <?php if (isset($_SESSION["sesion"])) : ?>
              <a href="cuenta">
                <p>Mi Cuenta</p>
              </a>
              <hr>
              <a href="funciones.php?a=logout">
                <p>Cerrar sesión</p>
              </a>
            <?php else : ?>
              <a href="login">
                <p>Inicia Sesión</p>
              </a>
              <hr>
              <a href="registro">
                <p>Regístrate</p>
              </a>
            <?php endif; ?>
          </ul>
        </div>

      </div>

    </div>

  </header>