<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
//Me creo objeto admin Auxiliar para las queries

include_once('../../controller/adopcion/createAdopcionController.php');

?>
    <div class="container mt-3">
        <h2>Nueva Adopción</h2>
        <form  id="myform" name="login" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="idAnimal">ID del Animal</label>
                    <input class="form-control" type="text" name="idAnimal" id="idAnimal" title="ID del animal" required
                        <?php if (!isset($errorPass)) echo " autofocus " ?>
                           placeholder="ID del animal" <?php if (isset($errorPass)) echo " value={$errorPass}" ?> >
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="idUsuario">ID del Usuario</label>
                    <input  class="form-control" type="text" name="idUsuario" id="idUsuario" placeholder="ID del Usuario"
                            required <?php if (isset($errorPass)) echo " autofocus" ?> >
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="fecha">Fecha de adopción</label>
                    <input  class="form-control" type="date" name="fecha" id="fecha" placeholder="Fecha adopción" required>

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="razon">Razón de la adopción</label>
                    <input  class="form-control" type="text" name="razon" id="razon" placeholder="Razón de la adopción" required>

                </div>
            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Crear Adopción">
                <a class="btn btn-dark"  href="adopcionView.php">Volver</a>
            </div>
        </form>
    </div>
<?php include_once ('../../shared/footer.php'); ?>