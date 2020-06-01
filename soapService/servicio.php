<?php

//Incluimos el fichero que contiene la clase con las funciones soap
include "FuncionesSoap.class.php";


//Establecemos la URI del servicio:
$uri = "http://localhost:8888/ProtectoraAnimales/soapService";

//Creamos el objeto SoapServer con la clase que hemos creado para que realice las operaciones.
// Declaramos null el WSDL y le pasamos el array de opciones creando un array asociativo indicando la URI
$servidor = new SoapServer(null, array('uri' => $uri));


//Como estamos trabajando con clases establecemos cual es la clase donde se ofrecen los servicios mediante método setClass()
$servidor->setClass("FuncionesSoap");

/* activamos el servicio con el método handle()*/
$servidor->handle();


