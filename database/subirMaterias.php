<?php 

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["profesor"])) {
    $nombre = $_POST["nombre"];
    $profesor = $_POST["profesor"];


    // Validar los campos de registro
    if (empty($nombre) || empty($profesor) ) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO materia (nombre, idProfesor) VALUES ('$nombre', '$profesor')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
            header("Location:../inicio/home.php");
            exit();
        } else {
            echo "Error en el registro: " . $conn->error;
            echo '<a href="../inicio/home.php">Volver a intentar</a>';
        }
    }
}
?>