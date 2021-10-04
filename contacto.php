<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>
<div class="margen-general">
    <h1>Escríbenos <i class="far fa-laugh-wink"></i></h1>
    <br>
    <h5>Puedes contactarnos en caso de tener algún problema, sugerencia o duda con el funcionamiento o contenido de la página no dudes en dejarla en el formulario de abajo, trataremos de responderte y solucionar el problema a la mayor brevedad.</h5>

    <!-- Mensaje emergente sobre un posible error de login (opcional) -->
    <?php if (isset($_SESSION["mensaje"])) { ?>
    <div id="mensaje_emergente" class="alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION["mensaje"] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        //Hacer que siempre se borren las varibles del mensaje emergente
        unset($_SESSION["mensaje"], $_SESSION["mensaje_color"]);
        //Condición para cerrar TODAS las variables de sesión. Para que no se cierre se debe iniciar sesión bien.
        if (!isset($_SESSION["sesion"])) { session_unset(); }
    ?>
    <?php } ?>

    <!-- Form de contacto -->
    <div id="contacto">
        <form class="" action="mail.php?type=contacto" method="post">
            <div class="row pb-4 pt-4">
                <div class="col-md">
                    <div class="form-group">

                        <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["nombre_iniciado"])) : ?>
                            <input class="form-control" type="text" value="<?= $_SESSION["nombre_iniciado"]." ".$_SESSION["apellido_iniciado"] ?>" aria-label="readonly input example" disabled>
                        <?php elseif (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["nombre_lib"])) : ?>
                            <input class="form-control" type="text" value="<?= $_SESSION["nombre_lib"] ?>" aria-label="readonly input example" disabled>
                        <?php else: ?>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <div class="col-md">
            <div class="form-group">

                <?php if (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["correo_iniciado"])) : ?>
                    <input class="form-control" type="email" value="<?= $_SESSION["correo_iniciado"] ?>" aria-label="readonly input example" disabled>
                <?php elseif (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true && isset($_SESSION["correo_lib"])) : ?>
                    <input class="form-control" type="email" value="<?= $_SESSION["correo_lib"] ?>" aria-label="readonly input example" disabled>
                <?php else: ?>
                    <input type="email" class="form-control" placeholder="Email" name="correo">
                <?php endif; ?>

            </div>
        </div>
        <div class="row pb-4">
            <div class="col-md">
                <div class="form-group">
                    <textarea class="form-control" placeholder="Comentarios" style="height: 150px;" name="comentario"></textarea>
                </div>
            </div>
        </div>
        
        <div class="row pb-4">
            <div class="col-md">
                <div class="form-group text-center">
                    <input class="btn btn-primary" type="submit" name="enviar" value="Enviar">
                </div>
            </div>
        </div>
    </form>
    <h2 class="text-center">¡Recuerda!</h2>
    <h4 class="text-center">Recuerda que puedes registrate gratis con nosotros</h4>
    <?php if (isset($_SESSION["mensaje"])) { ?>
        <div class="container alert alert-<?= $_SESSION["mensaje_color"] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION["mensaje"] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php session_unset(); ?>
    <?php } ?>

    <!-- Recuadro específico del registro -->
    <div class="card card-body">
        <div class="container pt-4">
            <h5 class="text-center">Únete a nuestra comunidad <i class="far fa-smile-beam"></i></h5>
        </div>
        <!-- Form de registro -->
        <form action="funciones.php?a=registro" method="post">

        <div class="form-group row pt-4">
            <div class="col">
                <input class="form-control" type="text" name="nombre" placeholder="Nombre(s)" autofocus>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="apellido" placeholder="Apellido(s)">
            </div>
        </div>

        <div class="form-group pt-4">
            <input class="form-control" type="email" name="correo" placeholder="Correo Electrónico">
        </div>

        <div class="form-group row pt-4">
            <div class="col">
                <select class="form-select" name="sexo" aria-label="Default select example">
                    <option selected>Sexo</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                </select>
            </div>
            <div class="col">
                <input class="form-control" type="number" name="edad" placeholder="Edad" minlength="1" maxlength="3">
            </div>
        </div>

        <div class="form-group row pt-4">
            <div class="col">
                <select class="form-select" name="ocupacion" aria-label="Default select example">
                    <option selected>Ocupacion</option>
                    <option value="1">Estudio</option>
                    <option value="2">Trabajo</option>
                    <option value="3">Otro</option>
                </select>
            </div>
            <div class="col">
            <select class="form-select" name="interes" aria-label="Default select example">
                <option selected>¿Qué te gusta más?</option>
                <option value="1">Textos educativos o afines</option>
                <option value="2">Literatura en general</option>
                <option value="3">Literatura antigua</option>
                <option value="4">Literatura moderna</option>
                <option value="5">Otro</option>
            </select>
            </div>
        </div>

        <div class="form-group row pt-5">
            <div class="col">
                <input class="form-control" type="password" name="contra1" placeholder="Contraseña" minlength="4" maxlength="16">
            </div>
            <div class="col">
                <input class="form-control" type="password" name="contra2" placeholder="Repite la contraseña" minlength="4" maxlength="16">
            </div>
        </div>

        <div class="form-group pt-5 pb-4">
            <input class="btn btn-primary" type="submit" name="enviar" value="Regístrate">
        </div>
        </form>
    </div>
    </div>
    </div>
</div>

<?php include("includes/footer.php") ?>