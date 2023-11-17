<?php
$hostname = getenv('DB_HOST') ?: 'localhost';
$database = getenv('DB_NAME') ?: 'eestn';
$username = getenv('DB_USER') ?: 'root'; 
$password = getenv('DB_PASSWORD') ?: '';

// Crear una conexión
$conn = new mysqli($hostname, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
?>
