<?php
/*
 * como no especificamos wsdl ponemos las url donde vamos a consumir el servicio
 * 'uri' => 'directorio donde está el servicio'  => identifica al recurso
 * 'location' => 'ruta absoluta del fichero que tiene el objeto SoapServer'
 * Observa que no incluimos ni la clase ni el archivo servidor del servicio
 */


$uri = "http://localhost:8888/ProtectoraAnimales/soapService/";
$url = "http://localhost:8888/ProtectoraAnimales/soapService/servicio.php";


try {
    //Creamos el cliente: El primer parámetro es null (No tenemos WSDL) y el segundo Array con las direcciones del servicio
    $cliente = new SoapClient(null, array(
        'uri' => $uri,
        'location' => $url));
    //Llamar a los métodos de la clase que tiene el servicio usando el objeto SoapClient que acabamos de crear arriba
    $adopcion = $cliente->obtieneDeIDAnimal(10);
    echo $adopcion . "<br>";

    $adopcion_2 = $cliente->obtieneDeIDAnimal(3);
    echo $adopcion_2 . "<br>";


} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>