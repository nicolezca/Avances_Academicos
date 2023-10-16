<?php
$sql = 'SELECT * FROM alumno';
$result = $conn->query($sql);

$alumnos = array(); // Creamos un arreglo para almacenar los datos de los alumnos

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $identificaciones[] = $row['id'];
        $nombres[] = $row['nombre'];
        $apellidos[] = $row['apellido'];
        $telefonos[] = $row['telefono'];
        $nacimientos[] = $row['nacimiento'];
        $documentaciones[] = $row['dni'];
        $correos[] = $row['correo'];
    }
}

?>
<?php include('../filter.php'); ?>
<?php if (isset($identificaciones) && count($identificaciones) > 0) : ?>
    <table id="tabla">
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
            <?php foreach ($identificaciones as $key => $id) : ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombres[$key]; ?></td>
                    <td><?php echo $apellidos[$key]; ?></td>
                    <td><?php echo $telefonos[$key]; ?></td>
                    <td><?php echo $nacimientos[$key]; ?></td>
                    <td><?php echo $documentaciones[$key]; ?></td>
                    <td><?php echo $correos[$key]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <!-- Mostrar un mensaje si no hay datos -->
    <div class="mensaje" style="text-align: center;">
        <p>No se han cargado ningún Alumno.</p>
    </div>
<?php endif; ?>

<form action="" method="post" id="formulario">
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