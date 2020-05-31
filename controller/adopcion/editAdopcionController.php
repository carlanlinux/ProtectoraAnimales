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

if (isset($_POST['idAnimal'])) {
    //Recuperamos los datos del formulario con sus corresopndientes filtros
    $idAdopcion = filter_var($_POST['idAdopcion']);
    $idAnimal = filter_var($_POST['idAnimal']);
    $idUsuario = filter_var($_POST['idUsuario'], FILTER_SANITIZE_NUMBER_INT);
    $fecha = filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
    $razon = filter_var($_POST['razon'], FILTER_SANITIZE_STRING);

    //Creamos un nuevo objeto con estos datos que usaremos para actualizar la base de datos llamando a sus métodos
    $adopcion = new Adopcion($idAnimal, $idUsuario, $fecha, $razon,$idAdopcion);
    $adopcion->actualizar();
    //Refrescamos la página para que se carguen los cambios, dejamos 1 segundos para que salte el mensaje de completado
    // con éxito la modificación al segundo de mostrar el mesanje
    header('Refresh: 1');


}

?>

