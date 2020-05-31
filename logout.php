<?php

//Abrimos la sesión y guardamos el usuario comprobando que la sesión no esté ha abierta
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    session_destroy();
}
header("Location: " . "index.php" );
