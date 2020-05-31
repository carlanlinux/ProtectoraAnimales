<?php
//Cargamos el fichero que carga los ficheros con funciones auxiliares y el autoload de clases
require ('private/initialize.php');


//Abrimos la sesión y guardamos el usuario comprobando que la sesión no esté ha abierta
if (session_status() == PHP_SESSION_NONE) session_start();


require_once ('controller/loginController.php');
require_once ('shared/header.php');


//Comprobamos qué nos llega en la sesión y por request para mostrar una vista en función de lo que nos llegue



if (isset($_SESSION['username']) && (!is_null($_SESSION['username']))) {
    //Me abre la vista principal
    redirect_to(url_for('/view/mainView.php'));
}
else {
    //Mostramos la página del formulario de registro de jugador
    redirect_to(url_for('/view/loginView.php'));
}

require_once ('shared/footer.php');