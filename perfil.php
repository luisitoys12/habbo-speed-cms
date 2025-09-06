<?php
include("includes/conexion.php");
include("includes/funciones.php");

$usuario_id = $_GET['id'];
$stmt = $conn->prepare("SELECT nombre, caracolas, tipo FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($nombre, $caracolas, $tipo);
$stmt->fetch();
$stmt->close();

$verificacion = obtenerVerificacion($tipo);
echo "<h2>👤 $nombre $verificacion</h2>";
echo "<p>🐚 Caracolas: $caracolas</p>";

echo "<h3>🏅 Insignias</h3><ul>";
$query = "SELECT i.nombre, i.icono FROM usuario_insignia ui JOIN insignias i ON ui.insignia_id = i.id WHERE ui.usuario_id = $usuario_id";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
  echo "<li><img src='{$row['icono']}' width='24'> {$row['nombre']}</li>";
}
echo "</ul>";
?>
