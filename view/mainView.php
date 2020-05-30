<?php //Cargamos la página de inicializar que está en la carpeta privada
if (!isset($_SESSION['username'])) {
    //header("Location: " . "index.php");
    //exit;
}
?>
<div id="myform">
    <ol>
    <li><a href=".?Adopciones">Adopciones</a></li>
    <li><a href=".?Administradores">Administradores</a></li>
    <li><a href=".?Usuarios">Usuarios</a></li>
    <li><a href=".?Animales">Animales</a></li>
    </ol>
</div>

