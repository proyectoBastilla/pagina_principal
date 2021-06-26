<?php
/*
Este archivo define las diferentes variantes de correos que se
pueden dar, se definen con el método get que va al archivo "mail.php"
y allí elige que mensaje usa.
*/

//Los archivos usan el css dentro de HTML por necesidad

$asunto_verifica = "Verifica tu cuenta La Bastilla";
$cuerpo_verifica =
'<html>
  <head>
  <style type="text/css">
    #general{
      border-width: 1px;
      border-radius: 10px;
      border-color: #D1D1D1;
      margin-top: 1em;
      margin-left: 20em;
      margin-right: 20em;
      padding: 2em;
      background-color: white;
      font-family: Verdana;
      color: black;
    }
    #principal h1{
      text-align: center;
      font-weight: bold;
      font-size: 36px;
      padding-left: 2em;
      padding-right: 2em;
    }
    #secundario h3{
      font-weight: lighter;
      font-size: 16px;
      padding-top: 1em;
      padding-left: 2em;
      padding-right: 2em;
      padding-bottom: 0.5em;
    }
    #boton{
      text-align: center;
      padding-top: 0.7em;
      padding-bottom: 3em;
    }
    #boton a{
      text-decoration:none;
      font-weight: 500;
      font-size: 18px;
      color:  black;
      padding-top:15px;
      padding-bottom:15px;
      padding-left:40px;
      padding-right:40px;
      background-color:#00D423;
      border-radius:25px;
    }
    #pie{
      font-size: 12px;
      color: #ACACAC;
      text-align: center;
      margin-left: 20em;
      margin-right: 20em;
      margin-top: 2em;
      margin-bottom: 4em;
      display: block;
    }
  </style>
  </head>
  <body>
    <div id="general">
      <div id="principal">
        <h1>¡Te has registrado satisfactoriamente!</h1>
      </div>
      <hr>
      <div id="secundario">
        <h3>El pasaje de librerías La Bastilla te da la bienvenida, este es el lugar donde podrás encontrar la disponibilidad de libros de tus tiendas favoritas a tan solo unos clicks de distancia.<br><br>Para poder usar todas nuestras funcionalidades verifica tu cuenta en el enlace de abajo:</h3>
      </div>
      <div id="boton">
        <a href="localhost/pagina_principal/02_login_page.php?id=verifica">Verifica tu cuenta</a>
      </div>
    </div>
    <div id="pie">
      <p>Este es un proyecto estudiantil que reúne algunas librerías del Pasaje La Bastilla, no tenemos ninguna vinculación legal con alguna empresa.<br>
      Ante cualquier eventualidad puedes contactarnos a este correo y te responderemos a la mayor brevedad.</p>
    </div>
  </body>
</html>'
;

$asunto_cambio = "Restablece tu contraseña";
$cuerpo_cambio =
'<html>
  <head>
  <style type="text/css">
    #general{
      border-width: 1px;
      border-radius: 10px;
      border-color: #D1D1D1;
      margin-top: 1em;
      margin-left: 20em;
      margin-right: 20em;
      padding: 2em;
      background-color: white;
      font-family: Verdana;
      color: black;
    }
    #principal h1{
      text-align: center;
      font-weight: bold;
      font-size: 36px;
      padding-left: 2em;
      padding-right: 2em;
    }
    #secundario h3{
      font-weight: lighter;
      font-size: 16px;
      padding-top: 1em;
      padding-left: 2em;
      padding-right: 2em;
      padding-bottom: 0.5em;
    }
    #boton{
      text-align: center;
      padding-top: 0.7em;
      padding-bottom: 3em;
    }
    #boton a{
      text-decoration:none;
      font-weight: 500;
      font-size: 18px;
      color: black;
      padding-top:15px;
      padding-bottom:15px;
      padding-left:40px;
      padding-right:40px;
      background-color:#00D423;
      border-radius:25px;
    }
    #pie{
      font-size: 12px;
      color: #ACACAC;
      text-align: center;
      margin-left: 20em;
      margin-right: 20em;
      margin-top: 2em;
      margin-bottom: 4em;
      display: block;
    }
  </style>
  </head>
  <body>
    <div id="general">
      <div id="principal">
        <h1>Restablece tu contraseña</h1>
      </div>
      <hr>
      <div id="secundario">
        <h3>Haz clic en el botón de abajo para ir a cambiar tu contraseña, asegúrate de recordarla luego:</h3>
      </div>
      <div id="boton">
        <a href="localhost/pagina_principal/02_login_page.php?id=restablecer">Cambio contraseña</a>
      </div>
    </div>
    <div id="pie">
      <p>Este es un proyecto estudiantil que reúne algunas librerías del Pasaje La Bastilla, no tenemos ninguna vinculación legal con alguna empresa.<br>
      Ante cualquier eventualidad puedes contactarnos a este correo y te responderemos a la mayor brevedad.</p>
    </div>
  </body>
</html>'
;

if (isset($_SESSION["sesion"]) && $_SESSION["sesion"]==true) {

  $asunto_contacto = "Nuevo Comentario";
  $cuerpo_contacto = "Se ha registrado una nueva respuesta en el formulario de contacto: \n\nNombre usuario: ".$_SESSION["nombre_iniciado"]." ".$_SESSION["apellido_iniciado"]."\nCorreo: ".$_SESSION["correo_iniciado"]."\n\n".$_POST["comentario"];

} else {

  $asunto_contacto = "Nuevo Comentario";
  $cuerpo_contacto = "Se ha registrado una nueva respuesta en el formulario de contacto: \n\nNombre usuario: ".$_POST["nombre"]."\nCorreo: ".$_POST["correo"]."\n\n".$_POST["comentario"];

}

?>
