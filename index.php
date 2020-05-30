<?php
//Abrimos la sesión y guardamos el usuario comprobando que la sesión no esté ha abierta
if (session_status() == PHP_SESSION_NONE) session_start();

require_once ('model/Admin.class.php');
require_once ('model/Adopcion.class.php');
require_once ('model/Animal.class.php');
require_once ('model/Usuario.class.php');
require_once ('controller/loginController.php');

require_once ('shared/header.php');


//Comprobamos qué nos llega en la sesión y por request para mostrar una vista en función de lo que nos llegue

if (isset($_REQUEST['Usuarios'])){
    require_once "view/usuariosView.php";

} elseif (isset($_REQUEST['Adopciones'])){
    require_once "view/adopcionView.php";

} elseif (isset($_REQUEST['Administradores'])){
    require_once "view/adminView.php";

} elseif (isset($_REQUEST['Animales'])){
    require_once "view/animalView.php";

} elseif (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location: " . "index.php");
}

elseif (isset($_SESSION['username']) && (!is_null($_SESSION['username']))) {
    //Me abre la vista del tablero
    require_once "view/mainView.php";
}
else {
    //Mostramos la página del formulario de registro de jugador
    require_once "view/loginView.php";
}

require_once ('shared/footer.php');