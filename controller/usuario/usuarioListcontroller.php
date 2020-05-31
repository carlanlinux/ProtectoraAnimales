<?php
//require('/model/Admin.class.php');
if (isset($_GET['removeItem'])){
    $id = filter_var($_GET['removeItem']);
    $tipoClase->borrar($id);
}


//Numero columnas
define('NUMCOLUMNAS', 1);
//Numero de resultados por pagina
define('ELEM_PAGINA', 5);
$html = "";


//Sacamos el número total de registros en la tabla
$registrosTotales = $tipoClase->contarRegistros();

//Sacamos el número de páginas que necesitaremos
if ($registrosTotales % ELEM_PAGINA)
    $totalPaginas = ceil($registrosTotales / ELEM_PAGINA);
else
    $totalPaginas = floor($registrosTotales / ELEM_PAGINA);

//Cogemos por get la página y si no viene nada empezamos por la 1
if (isset($_GET["pagina"])) {
    $nPagina = $_GET["pagina"];
    //si es menor que 1 le asignamos 1
    if ($nPagina < 1) $nPagina = 1;
} else {
    $nPagina = 1;
}
$registros = $tipoClase->obtienerPaginado(($nPagina - 1) * ELEM_PAGINA , ELEM_PAGINA);

//Comenzamos el HTML

$html = "<hr><br/>";
//Creamos un HTML vacío donde irán los datos que recogamos que sumaremos al de arriba cuando acabe el bucle
$htmlDatos = "";

//Crear el HTML para devolver por Ajax con la tabla
if (sizeof($registros) > 0) {
    $html .= "<section><table>";
    //recupera cada fila como un array asociativo
    $html .= "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Dirección</th><th>Teléfono</th><th></th><th></th></tr>";

    foreach ($registros as $registro) {
        $item = $registro->id;
        $editar = "<a class='btn btn-dark mr-1' href='usuarioEdit.php?item=". $item . "'>Editar</a>";
        $borrar = "<a class='btn btn-danger' href='?removeItem=". $item . "'>Borrar</a>";
        $htmlDatos .= "<tr><td> " . $item . "</td><td> $registro->nombre </td><td> $registro->apellido</td><td>$registro->sexo</td>
            <td> $registro->direccion </td><td> $registro->telefono </td><td>" . $editar ."</td><td> ". $borrar . "</td></tr>";
    }
    $html .= $htmlDatos;
    $html .= "</table>";
    $html .= "<br/><br/>";
    /* AQUÍ SE CREA LA PAGINACIÓN utilizando las clases que Bootstrap
     * tiene para ello */
    /*
     * En cada elemento de la lista que se crea con los números de
     * páginas se crea un enlace en el que al hacer clic se invoca a
     * la función JavaScript que hace las peticiones AJAX.
     * Como parámetro se le pasa el número de página
     */
    $html .= "<nav><ul class='pagination'>";
    // si es la primera página el enlace no debe estar activo
    /* al poner en el enlace "return false" evitamos que el navegador
     * intente seguir el enlace.
     * Además incluimos en el código que se ejecute la función listarElementos cuando
     * se pulse el emlace pasándole como parámetro el número de página que debe mostrar
     */
    if ($nPagina == 1)
        $html .= "<li class='page-item disabled text-dark'><a class='page-link text-dark' href='#'onclick='listarElementos(1);return false;'>&laquo;</a></li>";
    else
        $html .= "<li class='page-item text-dark'><a class='page-link text-dark' href='#'onclick='listarElementos(1);return false;'>&laquo;</a></li>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        //si coincide es la página actual y debe aparecer resaltada con la clase active.
        if ($nPagina == $i) {
            $html .= "<li class='page-item active text-dark'><a class='page-link text-dark' href='#' onclick='listarElementos(" . $i . ");return false;'>" . $i . "</a></li>";
        } else {
            $html .= "<li class='page-item text-dark'><a class='page-link text-dark' href='#' onclick='listarElementos(" . $i . ");return false;'>" . $i . "</a></li>";
        }

    }
    if ($nPagina == $totalPaginas) {
        /* Si es la última página el enlace >> debe aparecer deshabiliado
         */
        $html .= "<li class='page-item disabled text-dark'><a class='page-link' href='#' onclick='listarElementos(" . $totalPaginas . ");return false;'>&raquo</a></li>";
    } else {
        $html .= "<li class='page-item text-dark'><a class='page-link text-dark' href='#' onclick='listarElementos(" . $totalPaginas . ");return false;'>&raquo</a></li>";
    }
    $html .= "</ul></nav></section>";
} else {
    $html .= "No hay registros";
}
$html .= "<br/><hr><br/>";
/* devolvemos la respuesta*/

echo $html;

?>

