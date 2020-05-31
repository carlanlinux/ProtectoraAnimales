<?php
include_once ('../../shared/header.php');
include_once ('../../model/Admin.class.php');
//Me creo objeto admin Auxiliar para las queries

include_once ('../../controller/editController.php');

?>
    <form id="myform" name="login" action="" method="post">
        <fieldset>
            <legend>Edición de Administrador del sistema </legend>
            <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>
            <ol>
                <li>
                    <div class="titulo">
                        <h2 id="titulo">Edición de Administrador del sistema </h2>
                    </div>
                </li>
                <li>
                    <label for="usuario">Nombre</label>
                    <input type="text" name="username" id="usuario" title="Nombre de usuario" <?php if (!isset($errorPass)) echo " autofocus " ?>
                           placeholder="Nombre de usuario" <?php if (isset($oldUsername)) echo " value={$oldUsername}" ?> />
                </li>
                <li>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña"  <?php if (isset($errorPass)) echo " autofocus" ?> />
                </li>
                <li>
                    <label for="confirmPassword">Repetir Contraseña</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Repetir Contraseña"/>
                </li>
            </ol>
            <input class="btn btn-primary" id="enviar" type="submit" value="Editar Usuario">
        </fieldset>
    </form>

<?php include_once ('../../shared/footer.php'); ?>