<?php
  ob_start(); // turn on output buffering

  // session_start(); // turn on sessions if needed

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/');
  define("SHARED_PATH", PROJECT_PATH . '/shared');
  define("MODEL_PATH", PROJECT_PATH . '/model');
  define("CONTROLLER_PATH", PROJECT_PATH . '/controller');

  // Asignamos la raiz de la URL del sitio a la constante PHP
  // * No hay que incluir el dominio
  // * Usar el mismo document root que el webserver
  // * Se podría hacer hardodeado con defines:
  // define("WWW_ROOT", '/DWES/ProtectoraAnimales/public/');
  // define("WWW_ROOT", '');
  // * Lo ponemos de forma dinámica para que lo encuentre en la URL hasta /public
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/') + 1;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);


require_once(CONTROLLER_PATH . '/loginController.php');

  // Load class definitions manually usando requieres por cada fichero

/*Se pueden cargar todas las clases que estén dentro de un directorio usando la función glob: Gets last access time of file
Indicamos el directorio y el tipo de ficheros, los que estén en classes y temrinen por .class.php y esos me los cargas
 uno a  uno en cada bucle
foreach (glob('classes/*.class.php') as $fileClass) {
  require_once($fileClass);
}
  */


  // Cargo Automáticamente las clases
function myAutoload($class){
  if (preg_match("/\A\w+\Z/",$class)) {
    //Ponemos el include de la localización
    include PROJECT_PATH.'/model/' . $class . ".class.php";
  }
}

spl_autoload_register('myAutoload');

?>
