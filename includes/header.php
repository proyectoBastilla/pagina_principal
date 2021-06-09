<!DOCTYPE html>
<!-- Pongo "es" para que la página sea tratada en español -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bastilla</title>
    <!-- Link con BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Link con Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
    <header class="Header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="navbar-collapse mx-md-3">
              <a class="navbar-brand" href="index.php">La Bastilla</a>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="librerias.php">Librerias</a></li>
                <li class="nav-item"><a class="nav-link" href="mapa.php">Mapa</a></li>
                <li class="nav-item"><a class="nav-link" href="acerca.php">Acerca de</a></li>
              </ul>
              <form action="busqueda.php" method="post" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <input class="btn btn-outline-success" type="submit" value="Búsqueda">
              </form>
            </div>
      </nav>
    </header>
