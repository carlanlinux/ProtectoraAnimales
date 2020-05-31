<?php

if (isset($_POST['idAnimal'])) {
    $idAninal = filter_var($_POST['idAnimal']);
    $idUsuario = filter_var($_POST['idUsuario']);
    $fecha =  filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
    $razon = filter_var($_POST['razon'], FILTER_SANITIZE_STRING);


        $admin = new Adopcion($idAninal,$idUsuario, $fecha,$razon);
        $admin->crear();
    }

?>

