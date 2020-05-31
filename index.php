<?php
require ('private/initialize.php');

/*require_once ('model/Admin.class.php');
require_once ('model/Adopcion.class.php');
require_once ('model/Animal.class.php');
require_once ('model/Usuario.class.php');*/


//Abrimos la sesión y guardamos el usuario comprobando que la sesión no esté ha abierta
if (session_status() == PHP_SESSION_NONE) session_start();


require_once ('controller/loginController.php');
require_once ('shared/header.php');


//Comprobamos qué nos llega en la sesión y por request para mostrar una vista en función de lo que nos llegue



if (isset($_SESSION['username']) && (!is_null($_SESSION['username']))) {
    //Me abre la vista del tablero
    header("Location: " . "./view/mainView.php" );
}
else {
    //Mostramos la página del formulario de registro de jugador
    require_once "/view/loginView.php";
}

require_once ('shared/footer.php');