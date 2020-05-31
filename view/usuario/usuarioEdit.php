<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
include_once('../../controller/usuario/editUsuarioController.php');
//Me creo objeto admin Auxiliar para las queries
?>
    <div class="container mt-3">
        <h2>Editar usuario</h2>
        <form  name="login" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="id">Id Usuario</label>
                    <input  class="form-control" type="text" name="id" id="ud" placeholder="ID Usuario"
                            required <?php if (isset($errorPass)) echo " autofocus" ?>
                        <?php if (isset($id)) echo " value={$id}" ?>>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="nombre">Nombre</label>
                    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                            required <?php if (isset($errorPass)) echo " autofocus" ?>
                        <?php if (isset($oldNombre)) echo " value={$oldNombre}" ?>>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="apellido">Apellido</label>
                    <input  class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido" required
                        <?php if (isset($oldApellido)) echo " value={$oldApellido}" ?> >
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="sexo">Sexo</label>
                    <select  class="form-control" id="sexo" name="sexo" required>
                        <option value="Masculino" <?php if (isset($oldsexo)) {
                            if ($oldsexo == "Masculino" || $oldsexo == "Hombre") echo " selected";
                        } ?> >Masculino</option>
                        <option value="Femenino"  <?php if (isset($oldsexo)) {
                            if ($oldsexo == "Femenino" || $oldsexo == "Mujer") echo " selected";
                        } ?> >Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="direccion">Dirección</label>
                    <input  class="form-control" type="text" name="direccion" id="direccion" placeholder="Dirección" required
                        <?php if (isset($oldDireccion)) echo " value={$oldDireccion}" ?> >
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="telefono">Teléfono</label>
                    <small class="form-text text-muted">Formato telefono ES: 9 dígitos </small>
                    <input  class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono"
                            pattern="[0-9]{9}" required <?php if (isset($oldTelefono)) echo " value={$oldTelefono}" ?> >
                </div>
            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Editar Usuario">
                <a class="btn btn-dark"  href="usuarioView.php">Volver</a>
            </div>

            </fieldset>
        </form>
    </div>

<?php include ('../../shared/footer.php'); ?>