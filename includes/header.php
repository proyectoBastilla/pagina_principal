<!DOCTYPE html>
<!-- Pongo "es" para que la página sea tratada en español -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bastilla</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Link con BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Link con Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Link a estilo CSS -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body style="background-color:#f5f5f5;">
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-collapse mx-md-3">
        <a class="navbar-brand" href="index.php"><i class="fab fa-accessible-icon fa-lg"></i></a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 container-fluid">
          <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php"></a></li>
          <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home fa-lg"></i> Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="libros.php"><i class="fas fa-book fa-lg"></i> Libros</a></li>
          <li class="nav-item"><a class="nav-link" href="librerias.php"><i class="fas fa-store-alt fa-lg"></i> Librerías</a></li>
          <li class="nav-item"><a class="nav-link" href="mapa.php"><i class="fas fa-map-marked-alt fa-lg"></i> Mapa</a></li>
          <li class="nav-item"><a class="nav-link" href="acerca.php"><i class="fas fa-users fa-lg"></i> Acerca de</a></li>
          <?php if (isset($_SESSION["libreria"]) && $_SESSION["libreria"]==true): ?>
            <li class="nav-item"><a class="nav-link" href="gestor.php"><i class="fas fa-address-book fa-lg"></i> Gestión Libros</a></li>
          <?php endif; ?>
          <?php if (isset($_SESSION["libreria"]) && $_SESSION["libreria"]==true): ?>
            <li class="nav-item"><a class="nav-link" href="deseo.php"><i class="fas fa-heart fa-lg"></i> Deseos</a></li>
          <?php endif; ?>
        </ul>

        <?php if (!empty($_SESSION["nombre_iniciado"])) { ?>
          <div class="">
            <p class="text-white">Hola, <?= $_SESSION["nombre_iniciado"] ?></p>
          </div>
        <?php } ?>

        <!-- Botón login -->
        <i class="far fa-user color-white me-4 mt-1 fa-lg" style="color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

        <!-- Modal login -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Que quieres hacer?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true): ?>
                  <a href="funciones.php?a=logout"><button type="button" class="btn btn-outline-secondary">Cerrar sesión</button></a>
                <?php else: ?>
                  <a href="registro.php"><button type="button" class="btn btn-outline-secondary">Regístrate</button></a>
                    o
                  <a href="login.php"><button type="button" class="btn btn-outline-secondary">Inicia Sesión</button></a>
                <?php endif; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal login -->

        <!-- Búsqueda -->
        <form action="libros.php?a=buscar" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Búsqueda" type="search" name="buscar" style="background-color:#f5f5f5;">
            <button class="btn btn-secondary" type="submit"><i class="fas fa-search" style="color: white;"></i></button>
          </div>
        </form>
      </div>
    </nav>
  </header>
