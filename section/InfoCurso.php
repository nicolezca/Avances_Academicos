<?php

session_start();
$añoCurso = $_SESSION["año"];
$divisionCursp = $_SESSION["division"];
$idCurso = $_SESSION["idCurso"];

include('../database/conexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMateria = $_POST['materiaNombre'];

    $sql = "SELECT id FROM cursomateria WHERE materia= '$nombreMateria' AND ID_Curso = $idCurso";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idMateria = $row["id"];
    }
}

include('../database/consultaCurso.php');
$preceptores = obtenerNombrePreceptor($conn, $idCurso);
foreach ($preceptores as $preceptor) {
    $idPreceptor = $preceptor['id'];
    $nombreCompletoPreceptor = $preceptor['nombre'];
};

$profesores = obtenerNombreProfesor($conn, $idCurso);
foreach ($profesores as $profesor) {
    $idPreceptor = $profesor['id'];
    $nombreCompletoProfesor = $profesor['nombre'];
}

$alumnos = obtenerNombresAlumnos($conn, $idCurso);
foreach ($alumnos as $alumno) {
    $idAlumno = $alumno['id'];
    $nombreAlumno = $alumno['nombre'];
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inicio/css/curso2.css">
    <title><?php echo $nombreMateria, ' ', $añoCurso, ' ', $divisionCursp ?></title>
    <style>
        .formularioNotas {
            position: absolute;
            top: 0;
            transition: all .3s ease-in;
            left: calc(50% - 125px);
        }
        .formularioNotas form{
            background-color: white;
            padding: 1em;
            box-shadow: 0 0 15px rgba(225, 255, 225, .3);
        }
        .formularioNotas form .closeForm{
            display: flex;
            justify-content: end;
            margin-bottom: .5em;
        }
        .closeForm span{
            color: red;
        }
        .formularioNotas label{
            display: block;
            color: black;
            text-align: start;
            color: gray;
            font-size: 12px;
        }
        .formularioNotas input[type="number"]{
            padding: 5px;
            background: none;
            border: none;
            outline: none;
            border-bottom: 1px solid blue;
            color: blue;
        }
        .formularioNotas select{
            padding: 5px 10px;
            color: blue;
        }
        .formularioNotas input[type="submit"]{
            display: block;
            margin-top: 10px;
        }
        
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
                <?php echo ''; ?>
            <?php else : ?>
                <?php echo '<button id="VerFormPersonal" style="padding: 10px 30px;border-radius: 10px;border: none;outline: 1px solid white;background: none;color: white;transition: background .3s ease-in-out;cursor: pointer;">Agregar Personal</button>'; ?>
            <?php endif; ?>
            <button id="VerFormAlumno" style="padding: 10px 30px;border-radius: 10px;border: none;outline: 1px solid white;background: none;color: white;transition: background .3s ease-in-out;cursor: pointer;">Agregar Alumno</button>
            <a href="CursoMateria.php" id="volver">Volver Atras</a>
        </div>

        <div class="conten_directivos">
            <!-- Preceptor del Curso -->
            <div>
                <h2>Preceptora</h2>
                <?php if (!empty($preceptor['nombre'])) : ?>
                    <p><?php echo $preceptor['nombre']; ?></p>
                <?php else : ?>
                    <p>No hay datos del preceptor para este curso.</p>
                <?php endif; ?>
            </div>
            <!-- Docente del Curso -->
            <div>
                <h2>Docente</h2>
                <?php if (!empty($profesor['nombre'])) : ?>
                    <p><?php echo $profesor['nombre']; ?></p>
                <?php else : ?>
                    <p>No hay datos del Docente para este curso.</p>
                <?php endif; ?>
            </div>
        </div>
        <!-- HTML para mostrar los resultados -->
        <?php if (!empty($alumnos)) : ?>
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
                        <?php for ($i = 0; $i < count($alumnos); $i++) : ?>
                            <tr>
                                <td><?php echo $alumno['nombre']; ?></td>
                                <td>
                                    <button onclick="subirNota(<?php echo $alumno['id']; ?>)" style="background-color:blue;">Subir Nota</button>
                                    <div id="formulario_<?php echo $alumno['id']; ?>" class="formularioNotas" style="display:none;">
                                        <!-- Formulario de subir nota -->
                                        <form action="procesarNota.php" method="post">
                                            <div class="closeForm">
                                                <span id="close">X</span>
                                            </div>
                                            <!-- envio de datos invisibles -->
                                            <input type="hidden" name="idMateria" value="<?php echo $idMateria; ?>">
                                            <input type="hidden" name="idAlumno" value="<?php echo $alumno['id']; ?>">
                                            <input type="hidden" name="idCurso" value="<?php echo $idCurso; ?>">
                                            <input type="hidden" name="idPreceptor" value="<?php echo $preceptor['id']; ?>">
                                            <input type="hidden" name="idProfesor" value="<?php echo $profesor['id']; ?>">
                                            <!-- datos visibles -->
                                            <label for="nota">Ingrese la Nota</label>
                                            <input type="number" name="nota" id="nota" required placeholder="de 1 a 10">
                                            <select name="tipoNota" id="tipoNota">
                                                <option value="Trimestral">Trimestral</option>
                                                <option value="Parcial">Parcial</option>
                                                <option value="Final">Final</option>
                                            </select>
                                            <input type="submit" value="Subir Nota">
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="idCurso" value="<?php echo $alumno['id']; ?>">
                                        <input type="submit" value="Ver Notas">
                                    </form>
                                </td>
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
    <script>
        function subirNota(idAlumno) {
            var formulario = document.getElementById('formulario_' + idAlumno);
            formulario.style.display = 'block';
        }
    </script>
</body>

</html>