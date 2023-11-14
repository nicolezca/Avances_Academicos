<?php

session_start();
$añoCurso = $_SESSION["año"];
$divisionCursp = $_SESSION["division"];
$idCurso = $_SESSION["idCurso"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMateria = $_POST['materiaNombre'];
}


include('../database/conexion.php');
include('../database/consultaCurso.php');


$nombresAlumnos = obtenerNombresAlumnos($conn, $idCurso);
$nombreCompletoPreceptor = obtenerNombrePreceptor($conn, $idCurso);
$nombreCompletoProfesor = obtenerNombreProfesor($conn, $idCurso);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inicio/css/curso2.css">
    <title><?php echo $nombreMateria, ' ', $añoCurso, ' ', $divisionCursp ?></title>
    </style>
</head>

<body>
    <!-- navbar -->
    <header>
        <div class="logo">
            <img src="../assets/logo_escuela.png">
            <span>INDUSTRIAL</span>
        </div>
        <nav>
            <span><?php echo $nombreMateria; ?></span>
        </nav>
    </header>
    <main class="content">
        <div class="agregar">
            <?php if (!empty($nombreCompletoPreceptor)) : ?>
                <?php echo '';?>
            <?php else: ?>
                <?php echo '<button id="VerFormPersonal" style="padding: 10px 30px;border-radius: 10px;border: none;outline: 1px solid white;background: none;color: white;transition: background .3s ease-in-out;cursor: pointer;">Agregar Personal</button>';?>
            <?php endif; ?>
            <button id="VerFormAlumno" style="padding: 10px 30px;border-radius: 10px;border: none;outline: 1px solid white;background: none;color: white;transition: background .3s ease-in-out;cursor: pointer;">Agregar Alumno</button>
            <a href="CursoMateria.php" id="volver">Volver Atras</a>
        </div>


        <div class="conten_directivos">
            <!-- Preceptor del Curso -->
            <div>
                <h2>Preceptora</h2>
                <?php if (!empty($nombreCompletoPreceptor)) : ?>
                    <p><?php echo $nombreCompletoPreceptor; ?></p>
                <?php else : ?>
                    <p>No hay datos del preceptor para este curso.</p>
                <?php endif; ?>
            </div>
            <!-- Docente del Curso -->
            <div>
                <h2>Docente</h2>
                <?php if (!empty($nombreCompletoProfesor)) : ?>
                    <p><?php echo $nombreCompletoProfesor; ?></p>
                <?php else : ?>
                    <p>No hay datos del Docente para este curso.</p>
                <?php endif; ?>
            </div>
        </div>
        <!-- HTML para mostrar los resultados -->
        <?php if (!empty($nombresAlumnos)) : ?>
            <div class="content-tabla">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Subir Nota</th>
                            <th>Ver Notas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($nombresAlumnos); $i++) : ?>
                            <tr>
                                <td><?php echo $nombresAlumnos[$i]; ?></td>
                                <td><button onclick="subirNota(<?php echo $idAlumnos[$i]; ?>)" style="background-color:blue;">Subir Nota</button></td>
                                <td><button onclick="verNotas(<?php echo $idAlumnos[$i]; ?>)" style="background-color:white;color:blue;">Ver Notas</button></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <!-- Mostrar un mensaje si no hay datos -->
            <div class="mensaje" style="text-align: center;">
                <p>No se han cargado ningún Alumno.</p>
            </div>
        <?php endif; ?>
    </main>

    <!-- formulario de alumnos -->
    <form action="../database/SubirInfoAlumno.php" method="post" id="SubirAlumnos">
        <h2>Selecciona Alumno</h2>
        <select name="alumno" id="alumno">
            <?php
            $sql = "SELECT id, CONCAT(nombre,' ',apellido) AS alumnos FROM alumno";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['alumnos'] . "</option>";
                }
            }
            ?>
        </select>
        <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">
        <input type="submit" value="Enviar Alumno">
    </form>

    <!-- formulario de personal -->
    <form action="../database/SubirInfoPersonal.php" method="post" id="SubirPersonal">
        <h2>Selecciona Docente</h2>
        <select name="docente" id="docente">
            <?php
            $sql = "SELECT id, CONCAT(nombre,' ',apellido) AS Docente FROM profesores";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['Docente'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay Docentes </option>";
            }
            ?>
        </select>
        <h2>Seleccione Preceptor</h2>
        <select name="preceptor" id="preceptor">
            <?php
            $sql = "SELECT id, CONCAT(nombre,' ',apellido) AS Preceptor FROM preceptores";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['Preceptor'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay Preceptor </option>";
            }
            ?>
        </select>
        <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">
        <input type="submit" value="Enviar">
    </form>
    <script src="../inicio/js/curso.js"></script>
</body>

</html>