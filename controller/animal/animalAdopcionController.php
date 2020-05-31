<?php

if (isset($_POST['idAnimal'])) {
    $idAninal = filter_var($_POST['idAnimal'], FILTER_SANITIZE_NUMBER_INT);
    $idUsuario = (filter_var($_POST['idUsuario'], FILTER_SANITIZE_NUMBER_INT));
    $fecha =  (filter_var($_POST['fecha'], FILTER_SANITIZE_STRING));
    $razon = (filter_var($_POST['razon'], FILTER_SANITIZE_STRING));


        $admin = new Adopcion($idAninal,$idUsuario, $fecha,$razon);
        $admin->crear();
    }

?>

