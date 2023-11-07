<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header('Location: ../index.html');
    exit();
}

include('../database/conexion.php');
$sql = 'SELECT * FROM materia';
$result = $conn->query($sql);

$materias = array(); // Creamos un arreglo para almacenar los datos de los materias

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idMaterias[] = $row['id'];
        $nombres[] = $row['nombre'];
        $idProfesor[] = $row['idProfesor'];
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
    <?php include('../partials/sesionCerrar.php');?>
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

        <?php if (isset($idMaterias) && count($idMaterias) > 0) : ?>
            <table class="tabla">
                <thead>
                    <tr> <!-- Abre una fila de encabezados -->
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>ID Profesor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($idMaterias); $i++) : ?>
                        <tr>
                            <td><?php echo $idMaterias[$i]; ?></td>
                            <td><?php echo $nombre[$i]; ?></td>
                            <td><?php echo $idProfesor[$i]; ?></td>
                        </tr>
                    <?php endfor;
                    ?>
                </tbody>
            </table>
        <?php else : ?>
            <!-- Mostrar un mensaje si no hay datos -->
            <div class="mensaje" style="text-align: center;">
                <p>No se han cargado ningún Alumno.</p>
            </div>
        <?php endif; ?>

        <form action="../../database/subirMaterias.php" method="post" id="formSubir" class="formulario">
            <label for="nombre">Nombre de la Materia: </label>
            <input type="text" id="nombre" name="nombre" required autocomplete="off"><br><br>

            <label for="profesor">Asignar Profesor: </label>
            <select name="profesor" id="profesor">
                <?php
                // Consulta para obtener las salas disponibles
                $sql = "SELECT id, nombre, apellido FROM profesores";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . ' ' . $row['apellido'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay Docentes </option>";
                }
                ?>
            </select><br><br>
            <input type="submit" value="Agregar">
        </form>
    </div>

    <script src="../inicio/js/card.js"></script>
    <script src="../inicio/js/filter.js"></script>
    <script src="../inicio/js/forms.js"></script>
</body>

</html>