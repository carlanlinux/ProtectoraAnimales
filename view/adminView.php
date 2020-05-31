<?php
include_once ('../shared/header.php');
include_once ('../model/Admin.class.php');
include_once ('../model/Adopcion.class.php');
include_once ('../model/Animal.class.php');
include_once ('../model/Usuario.class.php');
//Me creo objeto admin Auxiliar para las queries
$tipoClase = new Admin();
include_once ('../controller/listController.php');

?>

<script type="text/javascript">
    function listarElementos(pagina) {
        var objAJAX = new XMLHttpRequest();
        /*utilizamos el método GET y pasamos al script como parámetro
         * el núemro de página que la función ha recibido
         */
        objAJAX.open("GET", "?pagina=" + pagina, true);
        objAJAX.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        objAJAX.onreadystatechange = function () {
            if (objAJAX.readyState === 4) {
                /* cargamos la respuesta recibida en el div */
                document.getElementById("datos").innerHTML = objAJAX.responseText;
            }
        }
        objAJAX.send();

    }

</script>

<div id="datos">

</div>

<?php include_once ('../shared/footer.php'); ?>