<?php
$host = "ramsoft.ddns.net";
$user = "facundo"; 
$pass = "Abc458765Bca!";    
$db   = "a_fisioq"; 

// Intentar la conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar si hubo error
if ($conn->connect_error) {
    // Si falla, mostramos el error real para saber si es por IP bloqueada o contraseña
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar el conjunto de caracteres para que las tildes y eñes funcionen bien
$conn->set_charset("utf8mb4");

// Opcional: Esto ayuda a que PHP te avise si hay errores en tus consultas SQL
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>