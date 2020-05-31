<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
include_once('../../controller/adopcion/editAdopcionController.php');
//Me creo objeto admin Auxiliar para las queries
?>
    <div class="container mt-3">
        <h2>Editar Adopción</h2>
        <form  id="myform" name="login" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="idAdopcion">ID del Animal</label>
                    <input class="form-control" type="text" name="idAdopcion" id="idAdopcion" title="ID de la adopción"
                        <?php if (isset($idAdopcion)) echo "value='{$idAdopcion}'" ?>>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="idAnimal">ID del Animal</label>
                    <input class="form-control" type="text" name="idAnimal" id="idAnimal" title="ID del animal" required
                           placeholder="ID del animal" <?php if (isset($errorPass)) echo " value={$errorPass}" ?>
                        <?php if (isset($oldIdAnimal)) echo  "value='{$oldIdAnimal}'" ?>>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="idUsuario">ID del Usuario</label>
                    <input  class="form-control" type="text" name="idUsuario" id="idUsuario" placeholder="ID del Usuario"
                            required <?php if (isset($oldIdUsuario)) echo "value='{$oldIdUsuario}'" ?> >
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="fecha">Fecha de adopción</label>
                    <input  class="form-control" type="date" name="fecha" id="fecha" placeholder="Fecha adopción" required
                        <?php if (isset($oldFecha)) echo "value='{$oldFecha}'" ?> >

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="razon">Razón de la adopción</label>
                    <input  class="form-control" type="text" name="razon" id="razon" placeholder="Razón de la adopción"
                            required <?php if (isset($oldRazon)) echo " value='{$oldRazon}'" ?>>

                </div>
            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Editar Adopción">
                <a class="btn btn-dark"  href="adopcionView.php">Volver</a>
            </div>
        </form>
    </div>

<?php include ('../../shared/footer.php'); ?>