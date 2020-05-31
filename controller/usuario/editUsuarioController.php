<?php

//Si viene por get capturamos el item que queremos modificar, creamos un objeto y lo llamamos a obtener objeto por ID
//Para que nos devuelva los datos.
if (isset($_GET['item'])){
    $itemAnimal = filter_var($_GET['item']);
    $animal = new Animal();
    $animal = $animal->obtieneDeID($itemAnimal);
    if ($animal){
        // OJO Undefined property: stdClass::$nomnbre in ... Típico error que sale cuando lo escribo mal
        $id = $animal->id;
        $oldNombre = $animal->nombre;
        $oldEspecie =$animal->especie;
        $oldRaza = $animal->raza;
        $oldGenero = $animal->genero;
        $oldColor = $animal->color;
        $oldEdad = $animal->edad;
    }

}

if (isset($_POST['id'])) {
    //Recuperamos los datos del formulario con sus corresopndientes filtros
    //Id le dejo con filter default porque está dando problemas al meterlo a la BD
    $id = filter_var($_POST['id']);
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $especie = filter_var($_POST['especie'],FILTER_SANITIZE_STRING);
    $raza = filter_var($_POST['raza'], FILTER_SANITIZE_STRING);
    $genero = filter_var($_POST['genero'], FILTER_SANITIZE_STRING);
    $color = filter_var($_POST['color'],FILTER_SANITIZE_STRING);
    $edad = filter_var($_POST['edad']);

    //Creamos un nuevo objeto con estos datos
    $adopcion = new Animal($nombre,$especie, $raza, $genero,$color,$edad, $id);
    $adopcion->actualizar();
    //Refrescamos la página para que se carguen los cambios, dejamos 1 segundos para que salte el mensaje de completado
    // con éxito la modificación al segundo de mostrar el mesanje
    header('Refresh: 1');


}

?>

