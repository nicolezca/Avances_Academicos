<?php
//conexion
include('../database/conexion.php');

session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: ../index.html');
    exit();
}
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
    <?php include('../partials/sesionCerrar.php');?>
        <h1>ESCUELA SECUNDARIA TECNICA N°1</h1>
        <P>La institución es una escuela técnica urbana de gestión pública ubicada en el Municipio de Chascomus dependiente de la región educativa 17 de la Provincia de Buenos Aires.</P>
        <P>Brinda servicios educativos de gestión estatal en la modalidad de educación común en el termino de secundario técnico avalado por el Instituto Nacional de Educación Tecnológica (INET).</P>

        <div class="ubicacion">
            <h2>UBICACION GEOGRAFICA</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6920.862929495881!2d-58.017429431702986!3d-35.568571472264324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95980da6a7f988bd%3A0x8fe4f82a3d73fc49!2sEscuela%20Industrial%20Chascomus!5e0!3m2!1ses!2sar!4v1697229690087!5m2!1ses!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <script src="js/card.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/forms.js"></script>
</body>

</html>