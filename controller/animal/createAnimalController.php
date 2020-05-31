<?php

if (isset($_POST['nombre'])) {
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $especie = filter_var($_POST['especie'], FILTER_SANITIZE_STRING);
    $raza = filter_var($_POST['raza'], FILTER_SANITIZE_STRING);
    $genero = filter_var($_POST['genero'], FILTER_SANITIZE_STRING);
    $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
    $edad = (filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT));



        $animal = new Animal($nombre,$especie, $raza, $genero,$color,$edad);
        $animal->crear();
    }

?>

