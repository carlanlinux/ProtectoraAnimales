<?php

//Abrimos la sesión y guardamos el usuario comprobando que la sesión no esté ha abierta
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    session_destroy();
}
//Redirigir a index.php, al no tener sesión mandará al login
header("Location: " . "index.php") ;
