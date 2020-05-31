<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
//Me creo objeto admin Auxiliar para las queries

include_once('../../controller/usuario/createUsuarioController.php');

?>
    <div class="container mt-3">
        <h2>Nuevo Usuario</h2>
        <form  name="usuario" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="nombre">Nombre</label>
                    <input  class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                            required <?php if (isset($errorPass)) echo " autofocus" ?> >
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="apellido">Apellido</label>
                    <input  class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="sexo">Sexo</label>
                    <select  class="form-control" id="sexo" name="sexo" required>
                        <option disabled selected>Escoger sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="direccion">Dirección</label>
                    <input  class="form-control" type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="telefono">Teléfono</label>
                    <small class="form-text text-muted">Formato telefono ES: 9 dígitos </small>
                    <input  class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono"
                            pattern="[0-9]{9}" required>
                </div>
            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Crear Usuario">
                <a class="btn btn-dark"  href="usuarioView.php">Volver</a>
            </div>
        </form>
    </div>
<?php include_once ('../../shared/footer.php'); ?>