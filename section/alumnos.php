<?php
include('../database/conexion.php');
$sql = 'SELECT * FROM alumno';
$result = $conn->query($sql);

$alumnos = array(); // Creamos un arreglo para almacenar los datos de los alumnos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idAlumno[] = $row['id'];
        $nombres[] = $row['nombre'];
        $apellidos[] = $row['apellido'];
        $telefonos[] = $row['telefono'];
        $nacimientos[] = $row['nacimiento'];
        $documentaciones[] = $row['dni'];
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
        <?php if (isset($idAlumno) && count($idAlumno) > 0) : ?>
            <table class="tabla">
                <thead>
                    <tr> <!-- Abre una fila de encabezados -->
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Nacimiento</th>
                        <th>DNI</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($idAlumno); $i++) : ?>
                        <tr>
                            <td><?php echo $idAlumno[$i]; ?></td>
                            <td><?php echo $nombres[$i]; ?></td>
                            <td><?php echo $apellidos[$i]; ?></td>
                            <td><?php echo $telefonos[$i]; ?></td>
                            <td><?php echo $nacimientos[$i]; ?></td>
                            <td><?php echo $documentaciones[$i]; ?></td>
                            <td><?php echo $correos[$i]; ?></td>
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

        <form action="../../../avance_academico/database/subirAlumno.php" method="post" id="formSubir" class="formulario">
            <label for="nombre">Nombre del Alumno:</label>
            <input type="text" id="nombre" name="nombre" required autocomplete="off"><br><br>

            <label for="apellido">Apellidos del Alumno:</label>
            <input type="text" id="apellido" name="apellido" required autocomplete="off"><br><br>

            <label for="telefono">Telefono del Alumno:</label>
            <input type="tel" id="telefono" name="telefono" required autocomplete="off"><br><br>

            <label for="nacimiento">Nacimiento del Alumno:</label>
            <input type="date" id="nacimiento" name="nacimiento" required autocomplete="off"><br><br>

            <label for="dni">Dni del Alumno:</label>
            <input type="number" id="dni" name="dni" required autocomplete="off"><br><br>

            <label for="correo">Correo del Alumno:</label>
            <input type="email" id="correo" name="correo" required autocomplete="off"><br><br>
            <input type="submit" value="Agregar">
        </form>
    </div>

    <script src="../inicio/js/filter.js"></script>
    <script src="../inicio/js/forms.js"></script>
</body>

</html>