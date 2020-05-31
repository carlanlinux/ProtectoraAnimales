<?php
require ('../private/initialize.php');

//Cargamos la página de inicializar que está en la carpeta privada
/*if (!isset($_SESSION['username'])) {
    header("Location: " . "index.php");
    exit;
}*/

include_once ('../shared/header.php');
?>

<div class="container">
    <ol>
    <li><a href="<?php echo VIEW_PATH . "/adopcion/animalView.php"?>  ">Adopciones</a></li>
    <li><a href="<?php echo VIEW_PATH . "/admin/adminView.php"?> ">Administradores</a></li>
    <li><a href="<?php echo VIEW_PATH . "/usuario/usuariosView.php"?> ">Usuarios</a></li>
    <li><a href="<?php echo VIEW_PATH . "/animal/animalView.php"?> ">Animales</a></li>
    </ol>
</div>

<?php include_once ('../shared/footer.php'); ?>