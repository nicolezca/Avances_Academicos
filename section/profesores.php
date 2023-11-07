<?php
include('../database/conexion.php');

$sql = 'SELECT * FROM profesores';
$result = $conn->query($sql);

$profesores = array(); // Creamos un arreglo para almacenar los datos de los profesores

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idProfesores[] = $row['id'];
        $nombres[] = $row['nombre'];
        $apellidos[] = $row['apellido'];
        $correos[] = $row['correo'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../inicio/css/general.css">
    <title>home | Industrial</title>
</head>

<body>
    <!-- barra de navegacion incluida de partiels -->
    <?php include('../partials/navBar.php'); ?>

    <!-- contenedor principal -->
    <div class="container" id="container">
        <nav id="filterNav">
            <div class="agregar">
                <button id="verformulario">+</button>
            </div>
            <div class="filtrar">
                <i class='bx bx-filter-alt'></i>
                <input type="search" name="filter" class="filter" placeholder="buscar nombre">
                <button id="aplicarFiltro">Aplicar Filtro</button>
            </div>
        </nav>
        <?php if (isset($idProfesores) && count($idProfesores) > 0) : ?>
            <table class="tabla">
                <thead>
                    <tr> <!-- Abre una fila de encabezados -->
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($idProfesores as $key => $id) : ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $nombres[$key]; ?></td>
                            <td><?php echo $apellidos[$key]; ?></td>
                            <td><?php echo $correos[$key]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <!-- Mostrar un mensaje si no hay datos -->
            <div class="mensaje" style="text-align: center;">
                <p>No se han cargado ningún Profesor.</p>
            </div>
        <?php endif; ?>

        <form action="../../../avance_academico/database/subirProfesores.php" method="post" id="formSubir" class="formulario">
            <label for="nombre">Nombre del Docente:</label>
            <input type="text" id="nombre" name="nombre" required autocomplete="off"><br><br>

            <label for="apellido">Apellidos del Docente:</label>
            <input type="text" id="apellido" name="apellido" required autocomplete="off"><br><br>

            <label for="correo">Correo del Docente:</label>
            <input type="text" id="correo" name="correo" required autocomplete="off"><br><br>
            <input type="submit" value="Agregar">
        </form>
    </div>

    <script src="../inicio/js/filter.js"></script>
    <script src="../inicio/js/forms.js"></script>
</body>

</html>