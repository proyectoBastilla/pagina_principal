<?php
//Incluye la sesión y la base de datos
include("includes/database.php");

$id_lib = $_GET["id"];

if ($_GET["a"]=="cambio") {
  cambio_disp($id_lib, $mysql);
}

function cambio_disp($id, $mysql) {
  $query_id = "SELECT disponible FROM libros WHERE id='$id'";
  $result_id = mysqli_query($mysql, $query_id);
  $disponible = mysqli_fetch_array($result_id);

  echo $disponible["disponible"];

  if ($disponible["disponible"]==1) {
    $query_disp = "UPDATE libros SET disponible='' WHERE id='$id'";
    $result_disp = mysqli_query($mysql, $query_disp);
  } else {
    $query_disp = "UPDATE libros SET disponible='1' WHERE id='$id'";
    $result_disp = mysqli_query($mysql, $query_disp);
  }
}

$id_back = $id_lib - 3;

header("location: 03_gestor_page.php#libro-$id_back");

?>
