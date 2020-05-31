<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
//Me creo objeto admin Auxiliar para las queries

include_once('../../controller/animal/createAnimalController.php');

?>
    <div class="container mt-3">
        <h2>Nueva Adopción</h2>
        <form  id="myform" name="login" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="nombre">Nombre</label>
                    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del animal"
                            required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="especie">Especie</label>
                    <input class="form-control" type="text" name="especie" id="especie" title="Especie" required
                        <?php if (!isset($errorPass)) echo " autofocus " ?>
                           placeholder="Especie del animal">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="raza">Fecha de adopción</label>
                    <input  class="form-control" type="text" name="raza" id="raza" placeholder="Raza" required>

                </div>

                    <div class="form-group">
                        <label class="form-control-label" for="genero">Genero</label>
                        <select  class="form-control" id="genero" name="genero" required>
                            <option disabled selected>Escoger género</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>

                <div class="form-group">
                    <label class="form-control-label" for="color">Color</label>
                    <input  class="form-control" type="text" name="color" id="color" placeholder="Color" required>

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="edad">Color</label>
                    <input  class="form-control" type="text" name="edad" id="edad" placeholder="Edad" required>

                </div>

            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Alta nuevo Animal">
                <a class="btn btn-dark"  href="animalView.php">Volver</a>
            </div>
        </form>
    </div>
<?php include_once ('../../shared/footer.php'); ?>