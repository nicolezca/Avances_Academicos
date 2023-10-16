<?php

$sql = 'SELECT * FROM profesores';
$result = $conn->query($sql);

$profesores = array(); // Creamos un arreglo para almacenar los datos de los profesores

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $identificaciones[] = $row['id'];
        $nombres[] = $row['nombre'];
        $apellidos[] = $row['apellido'];
        $correos[] = $row['correo'];
    }
}
?>
<nav id="filterNav">
    <div class="agregar">
        <button id="verformulario2">+</button>
    </div>
    <div class="filtrar">
        <i class='bx bx-filter-alt'></i>
        <input type="search" name="filter" class="filter" placeholder="buscar nombre">
        <button id="aplicarFiltro">Aplicar Filtro</button>
    </div>
</nav>
<?php if (isset($identificaciones) && count($identificaciones) > 0) : ?>
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
            <?php foreach ($identificaciones as $key => $id) : ?>
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

<form action="" method="post"  id="form-docente"  class="formulario">
    <label for="nombre">Nombre del Docente:</label>
    <input type="text" id="nombre" name="nombre" required autocomplete="off"><br><br>

    <label for="apellido">Apellidos del Docente:</label>
    <input type="text" id="apellido" name="apellido" required autocomplete="off"><br><br>

    <label for="correo">Correo del Docente:</label>
    <input type="text" id="correo" name="correo" required autocomplete="off"><br><br>
    <input type="submit" value="Agregar">
</form>