<?php

include('../database/conexion.php');
// Procesar registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["correo"])  && isset($_POST["clave"])) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    // Validar los campos de registro
    if (empty($nombre) || empty($correo) || empty($clave)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Verificar si el nombre ya está registrado en la base de datos
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows  == 1) {
            session_start();
                $_SESSION["nombre"] = $nombre;
            header("Location: ../inicio/home.php");
            exit();
        } else {
            echo "El usuario no esta registrado Por favor verifique su informacion: " . $conn->error;
            echo '<a href="../index.html">Volver a intentar</a>';
        }
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>