<?php
include_once ('./model/Admin.class.php');


if (isset($_POST['username'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = (filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    //Validación formulario, una vez validado aplica el cifrado md5 a la contraseña
    if ($username == "" && $password == "") {
        $error = "Debe introducir un usuario y contraseña";
        return;
    } elseif ($username == "")
    {
        $error = "Debe introducir un usuario";
        return;
    } elseif ($password == "") {
        $error = "Debe introducir una contraseña";
        return;
    } else {
        //si todos los campos están rellenos aplicamos el cifrado a la contraseña
        $password = md5($password);
    }
    //Creamos nuevo usuario admiministrador que nos servirá para acceder a los métodos y hacer el login
    $admin = new Admin();

    //Lllamamos a método para buscar usuario por username. Devuelve un objeto de la clase Admin
    $admin = $admin->obtenerPorUsername($username);
    //si el objeto es de la clase Admin validamos si la contraseña es correcta y en caso afitmativo enviamos al menú
    // principal. En caso contrario mostramos errores.
    if ($admin instanceof Admin) {
        if ($admin->password === $password) {
            if (session_status() == PHP_SESSION_NONE)
                session_start();
            $_SESSION['username'] = $username;
            header("Location: " . "./view/mainView.php" );
            exit;


        } else{
            $error = "Contrasñea incorrecta, intentelo de nuevo";
            //Utilizmos esta variable para dirigir el foco al campo contraseña y mantener el usuario en el campo usuario
            // sin borrarse
            $errorPass = $username;
        }
    } else {
        $error = "Administrador no enontrado, intentelo de nuevo";
    }
}


