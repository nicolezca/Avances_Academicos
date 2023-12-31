<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: ../index.html');
    exit();
}

include('../database/conexion.php');
$sql = 'SELECT * FROM curso';
$result = $conn->query($sql);

$cursos = array(); // Creamos un arreglo para almacenar los datos de los cursos

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idCurso[] = $row['id'];
        $años[] = $row['año'];
        $divisiones[] = $row['division'];
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
    <style>
        #anchoVer{
            width: 150px;
        }
        #MostarInfoSala input[type="submit"]{
            background-color: blue;
            color: white;
            border: none;
            outline: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all .3s ease-in-out;
        }
        #MostarInfoSala input[type="submit"]:hover{
            color: blue;
            background-color: white;
        }

    </style>
</head>

<body>
    <!-- barra de navegacion incluida de partiels -->
    <?php include('../partials/navBar.php'); ?>

    <!-- contenedor principal -->
    <div class="container" id="container" style="overflow-x: auto;">
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

        <?php if (isset($idCurso) && count($idCurso) > 0) : ?>
            <table class="tabla tablaCurso" style="margin-bottom: 20px;">
                <thead>
                    <tr> <!-- Abre una fila de encabezados -->
                        <th>ID</th>
                        <th>año</th>
                        <th>division</th>
                        <th id="anchoVer">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($idCurso); $i++) : ?>
                        <tr>
                            <td><?php echo $idCurso[$i]; ?></td>
                            <td><?php echo $años[$i]; ?></td>
                            <td><?php echo $divisiones[$i]; ?></td>
                            <td>
                                <form action="../database/Cursoinfo.php" method="post" id="MostarInfoSala">
                                    <input type="hidden" name="idSala" value="<?php echo $idCurso[$i]?> ">
                                    <input type="submit" value="informacion del Curso">
                                </form>
                            </td>
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

        <form action="../database/subircurso.php" method="post" id="formSubir" class="formulario">
            <label for="nombre">Nombre del Curso: </label>
            <select name="nombre" id="nombre" required autocomplete="off">
                <option value="1ro">1ro</option>
                <option value="2do">2do</option>
                <option value="3ro">3ro</option>
                <option value="4to">4to</option>
                <option value="5to">5to</option>
                <option value="6to">6to</option>
                <option value="7mo">7mo</option>
            </select><br><br>
            <label for="division">Division del Curso: </label>
            <select name="division" id="division" required autocomplete="off">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="1ra">1ra</option>
                <option value="2da">2da</option>
                <option value="3ra">3ra</option>
                <option value="4ta">4ta</option>
            </select><br><br>
            <input type="submit" value="Agregar">
        </form>
    </div>

    <script src="../inicio/js/card.js"></script>
    <script src="../inicio/js/filter.js"></script>
    <script src="../inicio/js/forms.js"></script>
</body>

</html> 