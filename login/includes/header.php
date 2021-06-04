<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="icon" href="img/contrato.png" type="image/png"/>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-dark bg-dark ">
        <div class="container">
          <a href="index.php"> <h3 class="navbar-brand">LOGIN</h3> </a>
        </div>
        <?php if (!empty($_SESSION["iniciado"])) { ?>
          <div class="container">
            <p class="text-white">Hola, <?= $_SESSION["iniciado"] ?></p>
            <a href="logout.php">Cerrar sesión</a>
          </div>
        <?php } ?>
      </nav>
    </header>
