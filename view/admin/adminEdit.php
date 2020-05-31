<?php
require_once('../../private/initialize.php');
include_once ('../../shared/header.php');
include_once('../../controller/admin/editAdminController.php');
//Me creo objeto admin Auxiliar para las queries
?>
    <div class="container mt-3">
        <h2>Edición de Administrador del sistema</h2>
        <form  id="myform" name="login" action="" method="post">
            <fieldset class="form-group">
                <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>

                <div class="form-group">
                    <label class="form-control-label" for="usuario">Usuario</label>
                    <input class="form-control" type="text" name="username" id="usuario" title="Nombre de usuario"
                        <?php if (!isset($errorPass)) echo " autofocus " ?>
                           placeholder="Nombre de usuario" <?php if (isset($oldUsername)) echo " value={$oldUsername}" ?> />
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña"
                    <?php if (isset($errorPass)) echo " autofocus" ?> /
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="confirmPassword">Repetir contraseña</label>
                    <input  class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Repetir Contraseña"/>
                    <small class="form-text text-muted" id="emailHelp">Las contraseñas han de ser iguales</small>
                </div>
            </fieldset>
            <div class="btn-group mb-3">
                <input type="submit" class="btn btn-dark"  id="enviar" value="Editar Usuario">
                <a class="btn btn-dark"  href="adminView.php">Volver</a>
            </div>
        </form>
    </div>

<?php include ('../../shared/footer.php'); ?>