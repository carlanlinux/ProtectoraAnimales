<?php

//Si viene por get capturamos el item que queremos modificar, creamos un objeto y lo llamamos a obtener objeto por ID
//Para que nos devuelva los datos.
if (isset($_GET['item'])){
    $itemAdopcion = filter_var($_GET['item'], FILTER_SANITIZE_NUMBER_INT);
    $adopcion = new Adopcion();
    $adopcion = $adopcion->obtieneDeID($itemAdopcion);
    if ($adopcion){
        $idAdopcion = $adopcion->id;
        $oldIdAnimal = $adopcion->idAnimal;
        $oldIdUsuario = $adopcion->idUsuario;
        $oldFecha = $adopcion->fecha;
        $oldRazon = $adopcion->razon;
    }

}

if (isset($_POST['$idAdopcion'])) {
    //Recuperamos los datos del formulario con sus corresopndientes filtros
    $idAdopcion = filter_var($_POST['$idAdopcion']. FILTER_SANITIZE_NUMBER_INT);
    $idAnimal = filter_var($_POST['idAnimal']. FILTER_SANITIZE_NUMBER_INT);
    $idUsuario = filter_var($_POST['idUsuario'], FILTER_SANITIZE_NUMBER_INT);
    $fecha = filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
    $razon = filter_var($_POST['razon'], FILTER_SANITIZE_STRING);

    //Creamos un nuevo objeto con estos datos
    $adopcion = new Adopcion($idAdopcion,$idAnimal, $idUsuario, $fecha, $razon);
    $adopcion->actualizar();


}

?>

