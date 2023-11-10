<?php 

include('../database/conexion.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso <!--aca ira el nuermo del curso --></title>
</head>
<body>
    <main class="container">
        <div class="conten_direcitos">
            <!-- Preceptor del Curso -->
            <div>
                <h2>Preceptora</h2>
                <span>
                    <?php
                        echo 'aca ira el preceptor';
                    ?>
                </span>
            </div>
            <!-- Docente del Curso -->
            <div>
                <h2>Preceptora</h2>
                <span>
                    <?php
                        echo 'aca ira el preceptor';
                    ?>
                </span>
            </div>
        </div>
        <div class="tabla">
            <!-- aca van los alumnos con ID,nombre-apellido, btn:subirNotas, btn:verNotas -->
            
        </div>
    </main>
</body>
</html>
<!-- aca se mostrara la informacion de todo el curs, si bien tendra que mostrar:

-1 preceptor
-1 profesor
-alumnos

-->