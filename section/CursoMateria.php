<?php
include('../database/conexion.php');

session_start();
$añoCurso = $_SESSION["año"];
$divisionCursp = $_SESSION["division"];
$idCurso = $_SESSION["idCurso"];

// Primera consulta
$sql = "SELECT materia FROM cursomateria WHERE ID_Curso = $idCurso";
$result = $conn->query($sql);

$materias = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row['materia'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
    <link rel="stylesheet" href="../inicio/css/curso2.css">
    <link rel="stylesheet" href="../inicio/css/forms.css">
    <style>
        .agregar button{
    padding: 10px 30px;
    border-radius: 10px;
    border: none;
    outline: 1px solid white;
    background: none;
    color: white;
    transition: background .3s ease-in-out;
    cursor: pointer;
}

.agregar button:hover {
    background: blue;
}
    </style>
    <title>Materias de <?php echo $añoCurso, ' ', $divisionCursp?></title>
</head>

<body>
    <!-- navbar -->
    <header>
        <div class="logo">
            <img src="../assets/logo_escuela.png" alt="">
            <span>INDUSTRIAL</span>
        </div>
        <nav>
            <span><?php echo $añoCurso, ' ',$divisionCursp; ?></span>
        </nav>
    </header>
    <!-- content -->
    <div class="content">
        <div class="agregar">
            <button id="verformulario">Agregar Materia</button>
            <a href="curso.php">Volver al Inicio</a>
        </div>
       
        <!-- table -->
        <?php if (isset($materias) && count($materias) > 0) : ?>
            <div class="content-tabla">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la Materia</th>
                        <th>Informacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contadorMaterias = 1; ?>
                    <?php for ($i = 0; $i < count($materias); $i++) : ?>
                        <tr>
                            <td><?php echo $contadorMaterias; ?></td>
                            <td><?php echo $materias[$i]; ?></td>
                            <td>
                                <form action='infoCurso.php' method='post'>
                                    <input type='hidden' name='materiaNombre' value='<?php echo  $materias[$i]; ?>'>
                                    <input type='submit' value='visualizar'>
                                </form>
                            </td>
                        </tr>
                        <?php $contadorMaterias++; ?>
                    <?php endfor; ?>
                </tbody>
            </table>
            </div>
        <?php else : ?>
            <!-- Mostrar un mensaje si no hay datos -->
            <div class="mensaje" style="text-align: center;">
                <p>No se encontraron materias para mostrar.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- form -->
    <form action="../database/subirMaterias.php" method="post" id="formSubir" class="formulario">
        <label for="nombre">Nombre de la Materia: </label>
        <input type="text" id="nombre" name="nombre" required autocomplete="off"><br><br>

        <!-- 
        <label for="profesor">Asignar Profesor: </label>
        <select name="profesor" id="profesor">
            <?php
            $sql = "SELECT id,nombre,apellido FROM profesores";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . ' ' . $row['apellido'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay Docentes </option>";
            }
            ?>
        </select><br><br> -->
        <input type="hidden" name="idCurso" value="<?php echo $idCurso?>">
        <input type="submit" value="Agregar"> 
    </form>

    <!-- script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const VerFormulario = document.getElementById('verformulario');
            const Formulario = document.getElementById('formSubir');

            Formulario.style.left = "500%";
            VerFormulario.addEventListener('click', () => {
                if (Formulario.style.left === "500%") { 
                    Formulario.style.left = "70%";
                } else {
                    Formulario.style.left = "500%";
                }
            })
        });
        
    </script>
</body>

</html>