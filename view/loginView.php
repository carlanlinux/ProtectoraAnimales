<?php require_once ('../private/initialize.php');
require ('../controller/loginController.php');
;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Protectora Animales</title>
    <link rel="stylesheet" href="../shared/styles/mystyle.css">

</head>
<body>

<form id="myform" name="login" action="" method="post">
    <fieldset>
        <legend>Inicio de Sesión - Inmobiliaria </legend>
    <span id="formerror" class="error"><?php if (isset($error)) echo $error?></span>
    <ol>
        <li>
            <div class="titulo">
                <h2 id="titulo">Iniciar sesión - Protectora animales</h2>

            </div>
        </li>
        <li>
            <label for="usuario">Nombre</label>
            <input type="text" name="username" id="usuario" title="Nombre de usuario" <?php if (!isset($errorPass)) echo " autofocus " ?>
                   placeholder="Nombre de usuario" <?php if (isset($errorPass)) echo " value={$errorPass}" ?> />
            <small class="form-text text-muted">Usuario: Admin | Contraseña: Admin </small>
        </li>
        <li>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Contraseña"  <?php if (isset($errorPass)) echo " autofocus" ?> />
        </li>
     </ol>
         <input id="enviar" type="submit" value="Iniciar sesión">
    </fieldset>
</form>

 <br>
</body>
</html>



