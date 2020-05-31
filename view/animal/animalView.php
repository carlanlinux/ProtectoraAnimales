<?php
require_once('../../private/initialize.php');
/*include_once ('../../model/Admin.class.php');
include_once ('../../model/Adopcion.class.php');
include_once ('../../model/Animal.class.php');
include_once ('../../model/Usuario.class.php');*/
//Me creo objeto admin Auxiliar para las queries
if (!isset($tipoClase)) $tipoClase = new Animal();


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

<div class="container" id="datos">
    <?php include_once ('../../shared/header.php'); ?>
    <!--    Creamos los botones del control del paginado-->
        <div class="container mt-3">
            <div class="btn-group mb-3">
                <a class="btn btn-dark p-1 m-0" href="<?php echo VIEW_PATH . "/mainView.php"?>">Atrás</a>
                <a class="btn btn-dark p-1 m-0" href="animalCreate.php">Alta Animal</a>
            </div>
            <h3>Listado paginado de Animales</h3>
        </div>
    <?php include_once('../../controller/animal/animalListcontroller.php');?>
    <?php include_once ('../../shared/footer.php'); ?>
</div>

