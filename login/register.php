<?php

include('../database/conexion.php');
// Procesar registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombreIngreso"]) &&  isset($_POST["apellidoIngreso"]) && isset($_POST["correoIngreso"])  && isset($_POST["claveIngreso"])
) {
    $nombre = $_POST["nombreIngreso"];
    $apellido = $_POST["apellidoIngreso"];
    $correo = $_POST["correoIngreso"];
    $clave = $_POST["claveIngreso"];

    // Validar los campos de registro
    if (empty($nombre) || empty($apellido)||empty($correo) || empty($clave)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Verificar si el nombre ya está registrado en la base de datos
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "El nombre de usuario ya está registrado.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (nombre, apellido, correo, clave) VALUES ('$nombre', '$apellido', '$correo', '$clave')";

            if ($conn->query($sql) === TRUE) {
                header("Location: ../inicio/home.php");
                exit();
            } else {
                echo "Error en el registro: " . $conn->error;
                echo '<a href="../formulario.html">Volver a intentar</a>';
            }
        }
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>