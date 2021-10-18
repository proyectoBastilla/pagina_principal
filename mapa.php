<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<!-- Aquí va todo el código propio de la página -->
<div class="margen-general">
    <h1><b>El Pasaje La Bastilla</b></h1><br>
    <div align="center">
      <!--Google map-->
      <div class="card">
        <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 600px">
        <img src="https://i.ibb.co/19TnDrm/mapa.png" alt="mapa" border="0">  
          <br></br>
          <a href="acerca#contacto">
            <button type="button" class="btn btn-dark btn-lg btn-block text-center">Contáctanos</button>
          </a>
          <a href="https://www.google.com/maps/place/Centro+Comercial+del+Libro+y+la+Cultura/@6.2484843,-75.5665868,18.79z/data=!4m5!3m4!1s0x0:0xb81bd00a721b3e1!8m2!3d6.2484896!4d-75.566758?hl=es-419" target="_blank">
            <button type="button"  class="btn btn-dark btn-lg btn-block text-center">Amplía el mapa</button>
          </a>

        </div>
        </div>
      <br></br>
      <p>El Pasaje La Bastilla, ubicado en pleno centro, es un referente histórico de la ciudad. Aquí existió el primer café de Medellín como establecimiento de comercio, del cual el pasaje tomó el nombre. Este café inició en 1920 y era un punto de encuentro de los intelectuales de la época, quienes hacían tertulias al calor de una taza de café o de una copa de licor. Sin embargo, este cerró en 1973, pero se quedó en el recuerdo de muchos.</p>
      <p>Este emblemático Pasaje, ubicado en la carrera 48, una cuadra arriba de Junín, y conformado por tres tramos: de La Playa a Colombia (caracterizado por sus cafés y bares), de Colombia a Ayacucho (reconocido por la venta de libros y donde se encuentra el Centro Comercial del Libro y la Cultura), y de Ayacucho a Pichincha (con sus almacenes de ropa)</p>
      <br>
      <p class="text-center">"La Bastilla fue una especie de compendio del Medellín de ese entonces. No hay escritor, periodista, profesor, pintor, bohemio, político, negociante, capitalista, burócrata, desharrapado recién venido de alguna parte que no hubiera instalado en los salones bastilleros su taller de frases o su charla multicolor"~Ernesto González~</p>
      <br><br>
      <img src="https://www.centrodemedellin.co/imagenes/galeria/Gal165Img2118.jpg" width="60%" alt="Imagen Pasaje la Bastilla">
    </div>
</div>

<!-- Trae todo el código del footer a la página principal -->
<?php include("includes/footer.php"); ?>
