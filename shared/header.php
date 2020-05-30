<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="shared/styles/mystyle.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
          crossorigin="anonymous">
</head>

<body>

<header>
    <h4><?php if (isset($_SESSION['username'])) {
        echo "Bienvenido " . $_SESSION['username'] . ". | <a href='.?logout'>Cerrar Sesión</a>";
}
?></h4>
</header>
