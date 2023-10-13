<?php

include('../database/conexion.php');
// Procesar registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombreingreso"]) &&  isset($_POST["apellidoIngreso"]) && isset($_POST["correoIngreso"])  && isset($_POST["claveIngreso"])
) {
    $nombre = $_POST["nombreingreso"];
    $apellido = $_POST["apellidoIngreso"];
    $correo = $_POST["correoIngreso"];
    $clave = $_POST["claveIngreso"];

    // Validar los campos de registro
    if (empty($nombre) || empty($apellido)||empty($correo) || empty($calve)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Verificar si el nombre ya está registrado en la base de datos
        $sql = "SELECT * FROM usuario WHERE nombre = '$nombre'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "El nombre de usuario ya está registrado.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO usuario (nombre, contrasena, tipo) VALUES ('$nombre', '$clave', '$tipo')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso";
                // Redireccionar a la página de inicio de sesión o a otra página de tu elección
                header("Location: ../../inicio/inicio.php");
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