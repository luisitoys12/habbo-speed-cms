<?php
require_once '../config/database.php';
$eventos = $conn->query("SELECT * FROM eventos ORDER BY fecha_inicio");

echo "<h2>📆 Calendario de Eventos</h2><table border='1'><tr><th>Fecha</th><th>Evento</th><th>Descripción</th></tr>";
while ($evento = $eventos->fetch_assoc()) {
  echo "<tr>
    <td>" . date("d M", strtotime($evento['fecha_inicio'])) . "</td>
    <td>" . htmlspecialchars($evento['titulo']) . "</td>
    <td>" . htmlspecialchars($evento['descripcion']) . "</td>
  </tr>";
}
echo "</table>";
