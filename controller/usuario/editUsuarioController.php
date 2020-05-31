<?php

//Si viene por get capturamos el item que queremos modificar, creamos un objeto y lo llamamos a obtener objeto por ID
//Para que nos devuelva los datos.
if (isset($_GET['item'])){
    $itemUsuario = filter_var($_GET['item']);
    $usuario = new Usuario();
    $usuario = $usuario->obtieneDeID($itemUsuario);
    if ($usuario){
        // OJO Undefined property: stdClass::$nomnbre in ... Típico error que sale cuando lo escribo mal
        $id = $usuario->id;
        $oldNombre = $usuario->nombre;
        $oldApellido =$usuario->apellido;
        $oldSexo = $usuario->sexo;
        $oldDireccion = $usuario->direccion;
        $oldTelefono = $usuario->telefono;
    }

}

if (isset($_POST['id'])) {
    //Recuperamos los datos del formulario con sus corresopndientes filtros
    //Id le dejo con filter default porque está dando problemas al meterlo a la BD
    $id = filter_var($_POST['id']);
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'],FILTER_SANITIZE_STRING);
    $sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);

    //Creamos un nuevo objeto con estos datos
    $usuario = new Usuario($nombre,$apellido, $sexo, $direccion,$telefono, $id);
    $usuario->actualizar();
    //Refrescamos la página para que se carguen los cambios, dejamos 1 segundos para que salte el mensaje de completado
    // con éxito la modificación al segundo de mostrar el mesanje
    header('Refresh: 1');


}

?>

