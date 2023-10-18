<?php 
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

<nav id="filterNav">
    <div class="agregar">
        <button id="verformulario4">+</button>
    </div>
    <div class="filtrar">
        <i class='bx bx-filter-alt'></i>
        <input type="search" name="filter" class="filter" placeholder="buscar nombre">
        <button id="aplicarFiltro">Aplicar Filtro</button>
    </div>
</nav>

<?php if (isset($idCurso) && count($idCurso) > 0) : ?>
    <table class="tabla tablaCurso" style="max-height: 400px; ">
        <thead>
            <tr> <!-- Abre una fila de encabezados -->
                <th>ID</th>
                <th>año</th>
                <th>division</th>
            </tr>
        </thead>
        <tbody>
                <?php for($i =0; $i<count($idCurso); $i++):?>
                <tr>
                    <td><?php echo $idCurso[$i]; ?></td>
                    <td><?php echo $años[$i]; ?></td>
                    <td><?php echo $divisiones[$i]; ?></td>
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

<form action="../database/subircurso.php" method="post" id="form-curso" class="formulario">
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

