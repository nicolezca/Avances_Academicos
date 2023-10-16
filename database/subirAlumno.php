<?php 

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["telefono"]) && isset($_POST["nacimiento"]) && isset($_POST["dni"]) && isset($_POST["correo"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $nacimiento = $_POST["nacimiento"];
    $dni = $_POST["dni"];
    $correo = $_POST["correo"];


    // Validar los campos de registro
    if (empty($nombre) || empty($apellido) || empty($telefono) || empty($nacimiento) || empty($dni) || empty($correo) ) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Verificar si el nombre ya está registrado en la base de datos
        $sql = "SELECT * FROM alumno WHERE dni = '$dni'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "El Alumno ya está registrado.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO alumno (nombre, apellido, telefono, nacimiento, dni, correo) VALUES ('$nombre', '$apellido', '$telefono', '$nacimiento','$dni','$correo')";

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
}
?>