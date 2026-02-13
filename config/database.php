<?php
mysqli_report(MYSQLI_REPORT_OFF);

$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = (int) (getenv('DB_PORT') ?: 3306);
$database = getenv('DB_NAME') ?: 'habbospeed';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';

$db_error = null;
$conn = @new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_errno) {
    $db_error = sprintf('No fue posible conectar a MySQL (%s).', $conn->connect_error ?: 'error desconocido');
    $conn = null;
} else {
    $conn->set_charset('utf8mb4');
}
