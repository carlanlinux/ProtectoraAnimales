<?php

include_once ('../model/Admin.class.php');
include_once ('../model/Adopcion.class.php');
include_once ('../model/Animal.class.php');
include_once ('../model/Usuario.class.php');
//Me creo objeto admin Auxiliar para las queries
if (!isset($tipoClase)) $tipoClase = new Admin();


?>

<script type="text/javascript">
    function listarElementos(pagina) {
        var xhr = new XMLHttpRequest();
        /*utilizamos el método GET y pasamos al script como parámetro
         * el núemro de página que la función ha recibido
         */
        xhr.open("GET", "?pagina=" + pagina, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                /* cargamos la respuesta recibida en el div */
                document.getElementById("datos").innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }
</script>


<div id="datos">
    <?php include_once ('../shared/headerList.php'); ?>
    <?php include_once ('../controller/listController.php');?>
    <?php include_once ('../shared/footer.php'); ?>
</div>

