<?php 

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["division"])) {
    $nombre = $_POST["nombre"];
    $division = $_POST["division"];


    // Validar los campos de registro
    if (empty($nombre) || empty($division) ) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO curso (año, division) VALUES ('$nombre', '$division')";

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