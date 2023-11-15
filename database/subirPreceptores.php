<?php 

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];


    // Validar los campos de registro
    if (empty($nombre) || empty($apellido) || empty($correo) ) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Verificar si el nombre ya está registrado en la base de datos
        $sql = "SELECT * FROM profesores WHERE correo  = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "El Preceptor ya está registrado.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO preceptores (nombre, apellido, correo) VALUES ('$nombre', '$apellido','$correo')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso";
                header("Location:../section/preceptores.php");
                exit();
            } else {
                echo "Error en el registro: " . $conn->error;
                echo '<a href="../section/preceptores.php">Volver a intentar</a>';
            }
        }
    }
}
?>