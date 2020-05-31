<?php require ('../../private/initialize.php');?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="styles/mystyle.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
    <title>Protectora de Animales - Menú de usuario</title>
    <style type="text/css">
        table {
            margin: auto;
            width: 100%;
        }

        section {
            width: 80%;
            margin: auto;
        }

        ul {
            width: 50%;
            margin: auto;
        }
    </style>
</head>
</head>

<body>
<?php if (session_status() == PHP_SESSION_NONE)
    session_start();?>

<header>
    <nav class="navbar bg-dark navbar-dark navbar-expand-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-sm-inline-block">
                <img src="../shared/images/wisdompetlogo.svg" style="width: 40px" alt="wisdom pet logo">
            </a>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="">Home</a>
                <a class="nav-item nav-link" href="<?php echo url_for('/view/adopcion/adopcionView.php');?>">Adopciones</a>
                <a class="nav-item nav-link" href="<?php echo url_for('/view/admins/adminsView.php');?>">Administradores</a>
                <a class="nav-item nav-link" href="<?php echo url_for('/view/usuarios/usuarioView.php');?>.">Usuarios</a>
                <a class="nav-item nav-link" href="<?php echo url_for('/view/animales/animalesView.php');?>.>Animales</a>
            </div>
            <span class="navbar-text d-xl-inline-block"><?php if (isset($_SESSION['username'])) {
                    echo 'Bienvenido '. $_SESSION["username"] . '. | <a href="../logout.php"' . " </a> Cerrar Sesión</a>";
                }
                ?></span>
        </div>
    </nav>
</header>