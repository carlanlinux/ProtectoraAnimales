<?php

require_once ('model/Admin.class.php');

//Me creo objeto admin Auxiliar para las queries
$adminAux = new Admin('query', 'query');
//Array con todos los administradores de la base de datos
$adminsList = $adminAux->obtieneTodos();

//Numero columnas
define('NUMCOLUMNAS', 1);
//Numero de resultados por pagina
define('PAGINADO', 3);
$numPaginas = ceil(sizeof($adminsList)/PAGINADO);


//Cogemos por get la página y si no viene nada empezamos por la 1
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
    //si es menor que 1 le asignamos 1
    if ($pagina < 1) $pagina = 1;
} else {
    $pagina = 1;
}

?>

