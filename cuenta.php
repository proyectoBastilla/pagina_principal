<?php //Incluye la sesión y la base de datos
include("./includes/database.php") ?>
<?php //Trae todo el código del header a la página principal
include("./includes/header.php") ?>

<?php if(isset($_SESSION["sesion"])): ?>
    
<?php else:
    header("location:404");
?>  
<?php endif; ?>





<?php include("./includes/footer.php") ?>
