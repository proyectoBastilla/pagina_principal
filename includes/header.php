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
  <!-- Link a fuentes -->
  <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
</head>

<body onresize="repliegue()">
  <header>
    <div class="header" id="header-back">
      <a href="javascript:void(0);" class="icon" onclick="despliegue()"><i class="fa fa-bars fa-2x"></i></a>
      <a href="index" class="header__nav-item navLogo"><img src="https://i.ibb.co/7bZqw4P/logo-corte.jpg" alt="logo-brand"></a>
      <a href="libros?pag=1" class="header__nav-item">Libros</a>
      <a href="librerias?pag=1" class="header__nav-item">Librerías</a>
      <a href="acerca" class="header__nav-item">Acerca de</a>

      <div class="header__right">
        <!-- Búsqueda -->
        <div class="header__nav-item search">
          <form action="funciones.php?a=buscar" method="get">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Búsqueda" type="search" name="buscar">
              <button class="buscar-btn btn" type="submit"><i class="fas fa-search"></i></button>
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
          <!-- Button trigger modal -->
          <i class="far fa-user" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
          <p>Login</p>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">¿Qué quieres hacer?</h5>
              </div>
              <div class="modal-body  text-center">
                <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"] == true) : ?>
                  <a href="funciones.php?a=logout"><button type="button" class="btn btn-outline-primary">Cerrar sesión</button></a>
                <?php else : ?>
                  <a href="registro"><button type="button" class="btn btn-outline-primary">Regístrate</button></a>
                  o
                  <a href="login"><button type="button" class="btn btn-outline-success">Inicia Sesión</button></a>
                <?php endif; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <?php if (isset($_SESSION["libreria"])) : ?>
          <div class="header__nav-item gestor-btn">
            <a href="gestor">
              <i class="fas fa-tools"></i>
              <p>Gestor</p>
            </a>
          </div>
        <?php endif; ?>

      </div>

    </div>

    <!-- Header únicamente sticky -->
    <div class="header-frente" id="header">
      <a href="javascript:void(0);" class="icon" onclick="despliegue()"><i class="fa fa-bars fa-2x"></i></a>
      <a href="index" class="header__nav-item navLogo"><img src="https://i.ibb.co/7bZqw4P/logo-corte.jpg" alt="logo-brand"></a>
      <a href="libros?pag=1" class="header__nav-item">Libros</a>
      <a href="librerias?pag=1" class="header__nav-item">Librerías</a>
      <a href="acerca" class="header__nav-item">Acerca de</a>

      <div class="header__right">
        <!-- Búsqueda -->
        <div class="header__nav-item search">
          <form action="funciones.php?a=buscar" method="get">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Búsqueda" type="search" name="buscar">
              <button class="buscar-btn btn" type="submit"><i class="fas fa-search"></i></button>
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
          <!-- Button trigger modal -->
          <i class="far fa-user" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
          <p>Login</p>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">¿Qué quieres hacer?</h5>
              </div>
              <div class="modal-body  text-center">
                <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"] == true) : ?>
                  <a href="funciones.php?a=logout"><button type="button" class="btn btn-outline-primary">Cerrar sesión</button></a>
                <?php else : ?>
                  <a href="registro"><button type="button" class="btn btn-outline-primary">Regístrate</button></a>
                  o
                  <a href="login"><button type="button" class="btn btn-outline-success">Inicia Sesión</button></a>
                <?php endif; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <?php if (isset($_SESSION["libreria"])) : ?>
          <div class="header__nav-item gestor-btn">
            <i class="fas fa-tools"></i>
            <p>Gestor</p>
          </div>
        <?php endif; ?>

      </div>

    </div>

  </header>