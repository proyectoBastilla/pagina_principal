<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>
<!--Alerta avisando que la página no es para la compra de libros-->
<div class="container-fluid alert alert-secondary text-center mb-3" style="max-width: 1050px;" role="alert">
    Recuerda que puedes contactar con la librería para más información
  </div>

<div class="container-fluid card mb-3" style="max-width: 1050px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="#" class="img-fluid rounded-start" width="100%" alt="Portada libro">
      </div>
        <div class="col-md-8">
            <div class="card-body">
            <h1 class="card-title pb-2 float-start">Librería</h1>
                <table class="table table-striped table-hover">
                    <tr>
                    <td>Dueño:</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td>Descripción:</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td>Local:</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td>Teléfono:</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td>Redes sociales:</td>
                    <td></td>
                    </tr>
                    <tr>
                </table>
            </div>
        </div>
    </div>
</div>











<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
