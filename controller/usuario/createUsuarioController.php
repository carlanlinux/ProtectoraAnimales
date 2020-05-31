<?php

if (isset($_POST['nombre'])) {
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);



    $animal = new Usuario($nombre,$apellido, $sexo, $direccion,$telefono);
    $animal->crear();
}

?>

