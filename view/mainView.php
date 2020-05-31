<?php //Cargamos la página de inicializar que está en la carpeta privada
/*if (!isset($_SESSION['username'])) {
    header("Location: " . "index.php");
    exit;
}*/

include_once ('../shared/header.php');
?>
<div id="myform">
    <ol>
    <li><a href="adopcionView.php">Adopciones</a></li>
    <li><a href="./admins/adminView.php">Administradores</a></li>
    <li><a href="usuariosView.php">Usuarios</a></li>
    <li><a href="animalView.php">Animales</a></li>
    </ol>
</div>

<?php include_once ('../shared/footer.php'); ?>