<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="shared/styles/mystyle.css" >
</head>

<body>

<header>
    <h4><?php if (isset($_SESSION['username'])) {
        echo "Bienvenido " . $_SESSION['username'] . ". | <a href='.?logout'>Cerrar Sesión</a>";
}
?></h4>
</header>
