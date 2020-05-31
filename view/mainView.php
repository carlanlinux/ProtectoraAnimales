<?php
require ('../private/initialize.php');

//Cargamos la página de inicializar que está en la carpeta privada
/*if (!isset($_SESSION['username'])) {
    header("Location: " . "index.php");
    exit;
}*/

include_once ('../shared/header.php');
?>
<body>
<main>
<div class="container">
    <ol class="list list-unstyled">
    <li class="list-item"><a class="text-dark" href="<?php echo VIEW_PATH . "/adopcion/animalView.php"?>  ">Adopciones</a></li>
    <li class="list-item"><a class="text-dark" href="<?php echo VIEW_PATH . "/admin/adminView.php"?> ">Administradores</a></li>
    <li class="list-item"><a class="text-dark" href="<?php echo VIEW_PATH . "/usuario/usuariosView.php"?> ">Usuarios</a></li>
    <li class="list-item"><a class="text-dark" href="<?php echo VIEW_PATH . "/animal/animalView.php"?> ">Animales</a></li>
    </ol>
</div>
</main>
<?php include_once ('../shared/footer.php'); ?>