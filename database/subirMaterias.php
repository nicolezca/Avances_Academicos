<?php 

include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $CursoID = $_POST["idCurso"];


    // Validar los campos de registro
    if (empty($nombre) || empty($CursoID) ) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO cursomateria(ID_Curso, materia) VALUES ('$CursoID', '$nombre')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
            header("Location:../section/CursoMateria.php");
            exit();
        } else {
            echo "Error en el registro: " . $conn->error;
            echo '<a href="../section/CursoMateria.php">Volver a intentar</a>';
        }
    }
}
?>