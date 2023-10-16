<?php
//conexion
include('../database/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/general.css">
    <title>home | Industrial</title>
</head>

<body>
    <!-- barra de navegacion incluida de partiels -->
    <?php include('../partials/navBar.php'); ?>
    
    <!-- contenedor principal -->
    <div class="container" id="container">
        <div id="inicio" class="content active">
            <?php include('../partials/inicio.php'); ?>
        </div>
        <div id="profesores" class="content">
            <?php include('../partials/profesores.php'); ?>
        </div>
        <div id="materias" class="content">
            <?php include('../partials/materias.php'); ?>
        </div>
        <div id="alumnos" class="content">
            <?php include('../partials/alumnos.php'); ?>
        </div>
        <div id="curso" class="content">
            <?php include('../partials/curso.php'); ?>
        </div>

    </div>

    <script src="js/main.js"></script>
    <script src="js/filter.js"></script>
</body>

</html>