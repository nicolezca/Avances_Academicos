<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreAlumno = $_POST["alumno"];
    $CursoID = $_POST["idCurso"];   

    include('conexion.php');

    // Inserta la información en la tabla Alumnos
    $sql = "INSERT INTO cursoalumno (ID_Alumno,ID_Curso) VALUES ( $nombreAlumno , $CursoID)";
    $resultado = $conn->query($sql);

    // Cierra la conexión a la base de datos
    $conn->close();

    // Puedes redirigir o realizar otras acciones después de la inserción
    header('Location: ../section/CursoMateria.php');
    exit();
}
?>