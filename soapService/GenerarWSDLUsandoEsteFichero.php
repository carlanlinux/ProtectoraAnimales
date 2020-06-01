<?php
/*
 * Vamos a crear un archivo WSDL que describa el servicio que ofrecemos.
 * Para crear el WSDL vamos a utilizar la librería WSDLDocument que se puede 
 * descargar desde el enlace: https://code.google.com/archive/p/WSDLdocument/
 * 
 * Lo primero que hacemos es desactivas las notificaciones para que no se muestren
 * este tipo de avisos, si no el fichero WSDL no se genera correctamente.
 * 
 * Después incluimos el archivo donde se encuentra el servicio que ofrecemos y 
 * el archivo WSDLDocument.php que contiene la clase WSDLDocument que vamos a usar.
 * 
 */
error_reporting(E_ALL ^ E_NOTICE);
include_once 'FuncionesSoap.class.php'; //Clase que ofrece el servicio
require_once 'WSDLDocument.php';

$uri = "http://localhost:8888/ProtectoraAnimales/soapService/";
$url = "http://localhost:8888/ProtectoraAnimales/soapService/servicio.php";
$server = 'FuncionesSoap'; //NombreClase que ofrece el servicio

/* creamos un objeto de la clase WSDL pasándole como argumento el nombre de la
 * clase que ofrece los servicios y la url u uri donde se ofrece el servicio.
 */

/* Si ponemos la cabecera indicando que el contenido es XML se ve directamente,
 * si no, debemos mirar el código fuente y copiar y pegar a un archivo vacio
 * NOTA: al copiar el código XML generado a un archivo vacío, asegúrate de
 * que la codificación del XML es UTF-8
 */

header("Content-type: text/xml");
$wsdl = new WSDLDocument($server, $url, $uri);

//hacemos que genere el fichero wsdl en formato xml
echo $wsdl->saveXML();
?>
