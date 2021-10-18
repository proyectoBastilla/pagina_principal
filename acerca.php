<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<div class="margen-general">
  <h1><b>Proyecto La Bastilla</b></h1>
  <h4><b>Esta es la página web para nuestro proyecto de grado.</b></h4>
  <br>
<div class="nosotros">
  <h2>Sobre nosotros:</h2>
  <img src="https://i.ibb.co/xmFSShx/nosotros.jpg" style="float:right;" class="nosotrosimagen" alt="libreriamiguel" border="0">

  <h5>
    Somos una pagina web desarrollada por los estudiantes:
    <br>Ana Sofía Álvarez Giraldo <br>Juan Pablo Atehortúa Orozco
  <br>Daniel Correa Botero<br>Cristian David Hoyos Rodríguez<br>Santiago Villada Ortiz</h5><br>
</div>
<br><br>
  
  <hr width=100% style="color:#222222; height: 3px;">
  <p id="sec-cont">Aclaramos que no pertenecemos ni representamos a ninguna librería en particular, somos un grupo de estudiantes que, por el contrario, queremos generar un espacio para reunir las diferentes librerías que componen el conocido Pasaje la Bastilla ubicado en la ciudad de Medellín, Colombia. A través de este medio, tenemos el propósito de incentivar la lectura de todo tipo de libros, apoyando a su vez, los emprendimientos de este lugar, para que tengan más visibilidad en la web y brinden mayor facilidad a sus clientes al momento de buscar los textos que deseen.</p>

  <br><br>

  
</div>
<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
