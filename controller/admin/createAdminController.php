<?php

if (isset($_POST['username'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = (filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $confirmPassword =  (filter_var($_POST['confirmPassword'], FILTER_SANITIZE_STRING));

    //Validación formulario, una vez validado aplica el cifrado md5 a la contraseña
    if ($username == "" && $password == "") {
        $error = "Debe introducir un usuario y contraseña";
        return;
    } elseif ($username == "")
    {
        $error = "Debe introducir un usuario";
        return;
    } elseif ($confirmPassword == "") {
        $error = "Debe repetir la contraseña";
        $errorPass = $username;
        return;
    } elseif ($password == "") {
        $error = "Debe introducir una contraseña";
        $errorPass = $username;
        return;
    } elseif ($password !== $confirmPassword) {
        $error = "La contrasñea debe ser la misma.";
        $errorPass = $username;
        return;
        //Creamos el objeto con los datos y ejecutamos su método crear para meterlo en la BD
    } else {
        $admin = new Admin($username,$password);
        $admin->crear();
    }

}
?>

