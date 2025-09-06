<?php
require_once '../../config/database.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="noticias.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Título', 'Contenido', 'Fecha']);

$result = $conn->query("SELECT * FROM noticias");
while ($row = $result->fetch_assoc()) {
  fputcsv($output, $row);
}
fclose($output);
exit();
