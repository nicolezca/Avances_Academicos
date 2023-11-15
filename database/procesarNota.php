<?

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idMateria'])  && isset($_POST['idAlumno'])  && isset($_POST['idCurso'])  && isset($_POST['idPreceptor'])  && isset($_POST['idProfesor'])  && isset($_POST['nota'])  && isset($_POST['tipoNota']) ){

    $idMateria = $_POST["idMateria"];
    $idAlumno = $_POST["idAlumno"];
    $idCurso = $_POST["idCurso"];
    $idPreceptor = $_POST["idPreceptor"];
    $idProfesor = $_POST["idProfesor"];

    $nota = $_POST["nota"];
    $tipoNotas = $_POST["tipoNota"];
    
    include('conexion.php');
    // sacar el tiempo automatico??

    $sql = "INSERT INTO tiponota(descripcion,tipo) VALUES($nota, $tipoNotas)";
    $result = $conn -> query($sql);

    if($conn->query($sql) === TRUE){
        //guardar en variable el tiempo sacado automatico asi se inserta
        
        //hacer que se genere el id de la tabla nota para despues insertarlo en la otra tabla

        $idTipoNOtas = 1;
        $fechaHora = '00-00-0000';
        $sql ="INSERT INTO notas(idMateria,idAlumno,idTiponota,idCurso,idPreseptor,idProfesor,fechahora) VALUES($idMateria, $idAlumno, $idTipoNOtas, $idCurso, $idPreceptor, $idProfesor,$fechaHora )";
        $result = $conn-> query($sql);
        if($conn->query($sql) === TRUE){
            header(
                "Location:../section/CursoMateria.php"
            );
            exit;
        }else{
            echo '<script>alert("Error al insertar el registro de las notas");window.location.href="../section/CursoMateria.php"</script>';
        }
    }else{
        echo '<script>alert("Error al insertar la nota");window.location.href="../section/CursoMateria.php"</script>';
    }
}
$conn->close();
?>