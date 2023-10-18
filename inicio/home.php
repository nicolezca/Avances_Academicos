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
            <?php include('../partials/section/inicio.php'); ?>
        </div>
        <div id="profesores" class="content">
            <?php include('../partials/section/profesores.php'); ?>
        </div>
        <div id="materias" class="content">
            <?php include('../partials/section/materias.php'); ?>
        </div>
        <div id="alumnos" class="content">
            <?php include('../partials/section/alumnos.php'); ?>
        </div>
        <div id="curso" class="content" style="max-height: 100%;overflow-x: auto;" >
            <?php include('../partials/section/curso.php'); ?>
        </div>

    </div>

    <script src="js/main.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/forms.js"></script>
</body>

</html>