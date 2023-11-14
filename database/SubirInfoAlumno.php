<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreAlumno = $_POST["alumno"];
    $CursoID = $_POST["idCurso"];   

    include('conexion.php');

    // Inserta la información en la tabla Alumnos
    $sql = "INSERT INTO cursoinfo (ID_Alumno,ID_Curso) VALUES ( $nombreAlumno , $CursoID)";
    $resultado = $conn->query($sql);

    $eliminar = "DELETE FROM cursoinfo";
    $resultadoeliminar = $conn -> query($eliminar);


    $actualizar = "UPDATE SET curosinfo ID_Alumno = '145'";
    $resultadoActualizar = $conn -> query($actualizar);
    // Cierra la conexión a la base de datos
    $conn->close();

    // Puedes redirigir o realizar otras acciones después de la inserción
    header('Location: ../section/infoCurso.php');
    exit();
}
?>