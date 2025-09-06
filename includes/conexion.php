<?php
$host = "localhost";         // Cambia si tu servidor es diferente
$usuario = "phdcpjffyn";           // Tu usuario de base de datos
$contrasena = "x5c78bvHZG";            // Tu contraseña de base de datos
$base_datos = "phdcpjffyn";  // Nombre de tu base de datos

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
  die("❌ Error de conexión: " . $conn->connect_error);
}

// Opcional: establecer codificación UTF-8
$conn->set_charset("utf8mb4");
?>
