<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreProfesor = $_POST["docente"];
        $nombrePreceptor = $_POST["preceptor"];
        $CursoID = $_POST["idCurso"];

        include('conexion.php');

        // Inserta la información en la tabla Alumnos
        $sql = "INSERT INTO cursopersonal (ID_Curso, ID_Preceptor, ID_Profesor) VALUES ( $CursoID, $nombrePreceptor, $nombreProfesor)";
        $resultado = $conn->query($sql);

        // Cierra la conexión a la base de datos
        $conn->close();

        header('Location: ../section/CursoMateria.php');
        exit();
    }
?>