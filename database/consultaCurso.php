<?php

function obtenerNombresAlumnos($conn, $idCurso) {
    $sql = "SELECT a.id, a.nombre, a.apellido FROM cursoalumno ca JOIN alumno a ON ca.ID_Alumno = a.id WHERE ca.ID_Curso = $idCurso";
    $result = $conn->query($sql);

    $alumnos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $alumno = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'] . ' ' . $row['apellido']
            );
            $alumnos[] = $alumno;
        }
    }

    return $alumnos;
}

function obtenerNombrePreceptor($conn, $idCurso) {
    $sql = "SELECT p.id, p.nombre, p.apellido FROM cursopersonal cp JOIN preceptores p ON cp.ID_Preceptor = p.id WHERE cp.ID_Curso = $idCurso";
    $result = $conn->query($sql);

    $preceptores = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $preceptor = array(
                "id"=> $row["id"],
                "nombre"=> $row["nombre"] . ' ' . $row['apellido']
            );
            $preceptores[] = $preceptor;
        }
    }

    return $preceptores ;
}

function obtenerNombreProfesor($conn, $idCurso) {
    $sql = "SELECT pr.id, pr.nombre, pr.apellido FROM cursopersonal cp JOIN profesores pr ON cp.ID_Profesor = pr.id WHERE cp.ID_Curso = $idCurso";
    $result = $conn->query($sql);

    $profesores = array();


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $profesor = array(
                'id' => $row['id'],
                'nombre'=> $row['nombre'] . ' '. $row['apellido']
            );
            $profesores[] = $profesor;
        }
    }

    return $profesores;
}

?>
