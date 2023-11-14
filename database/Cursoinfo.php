<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idSala = $_POST["idSala"];

    // Realiza la conexión
    include('conexion.php');

    $sql = "SELECT id, año, division FROM curso WHERE id = $idSala";
    $resultado = $conn->query($sql);

    // Verifica si la consulta se ejecutó correctamente
    if ($resultado) {
        $fila = $resultado->fetch_assoc();

        // Verifica si se obtuvo una fila y si las columnas tienen valores
        if ($fila && isset($fila['año'], $fila['division'])) {
            $idCurso = $fila['id'];
            $añoCurso = $fila['año'];
            $divisionCurso = $fila['division'];
            $resultado->free_result();
            $conn->close();
            
            $_SESSION["idCurso"] = $idCurso;
            $_SESSION["año"] = $añoCurso;
            $_SESSION["division"] = $divisionCurso;

            header('Location: ../section/CursoMateria.php');
            exit();
        } 
    } 
}
?>
