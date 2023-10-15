<?php 
    //conexion
    include('../database/conexion.php');
    $sql = 'SELECT * FROM profesores';
    $result = $conn->query($sql);
    
    $profesores = array(); // Creamos un arreglo para almacenar los datos de los profesores
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $identificaciones[] = $row['id'];
            $doctores[] = $row['nombre'];
            $apellidos[] = $row['apellido'];
            $correos[] = $row['correo'];
        }
    }
?>