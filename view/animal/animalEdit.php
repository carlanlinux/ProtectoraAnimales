<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
include_once('../../controller/animal/editAnimalController.php');
//Me creo objeto admin Auxiliar para las queries
?>
    <div class="container mt-3">
        <h2>Editar Animal</h2>
        <form  id="myform" name="login" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="id">ID Animal</label>
                    <input  class="form-control" type="text" name="id" id="id" placeholder="Id Animal"
                        <?php if (isset($id)) echo " value={$id}" ?> required/>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="nombre">Nombre</label>
                    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del animal"
                        <?php if (isset($oldNombre)) echo " value={$oldNombre}" ?> required/>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="especie">Especie</label>
                    <input class="form-control" type="text" name="especie" id="especie" title="Especie" required
                        <?php if (isset($oldEspecie)) echo " value={$oldEspecie}" ?>
                           placeholder="Especie del animal"/>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="raza">Raza</label>
                    <input  class="form-control" type="text" name="raza" id="raza" placeholder="Raza" required
                        <?php if (isset($oldRaza)) echo " value={$oldRaza}" ?> >

                </div>

                <div class="form-group">
                    <label class="form-control-label" for="genero">Genero</label>
                    <select  class="form-control" id="genero" name="genero" required>
                        <option disabled>Escoger género</option>
                        <option value="Macho" <?php if (isset($oldGenero)) {
                            if ($oldGenero == "Macho" || $oldGenero == "macho") echo " selected";
                        } ?> >Macho</option>
                        <option value="Hembra"  <?php if (isset($genero)) {
                            if ($oldGenero == "Hembra" || $oldGenero == "hembra") echo " selected";
                        } ?> >Hembra</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="color">Color</label>
                    <input  class="form-control" type="text" name="color" id="color" placeholder="Color" required
                        <?php if (isset($oldColor)) echo " value={$oldColor}" ?>>

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="edad">Edad</label>
                    <input  class="form-control" type="number" min="0" max="20" step="1" name="edad" id="edad"
                            placeholder="Edad" required  <?php if (isset($oldEdad)) echo " value={$oldEdad}" ?> >

                </div>

            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Editar">
                <a class="btn btn-dark"  href="animalnView.php">Volver</a>
            </div>
        </form>
    </div>

<?php include ('../../shared/footer.php'); ?>