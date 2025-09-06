<?php
require_once '../../config/database.php';
session_start();

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit(); }

$result = $conn->prepare("SELECT * FROM eventos WHERE id = ?");
$result->bind_param("i", $id);
$result->execute();
$evento = $result->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $inicio = $_POST['fecha_inicio'];
  $fin = $_POST['fecha_fin'];
  $imagen = $_POST['imagen'];

  $stmt = $conn->prepare("UPDATE eventos SET titulo = ?, descripcion = ?, fecha_inicio = ?, fecha_fin = ?, imagen = ? WHERE id = ?");
  $stmt->bind_param("sssssi", $titulo, $descripcion, $inicio, $fin, $imagen, $id);
  $stmt->execute();
  header('Location: index.php');
}
?>

<h2>✏️ Editar evento</h2>
<form method="POST">
  <input name="titulo" value="<?= htmlspecialchars($evento['titulo']) ?>" required>
  <textarea name="descripcion" required><?= htmlspecialchars($evento['descripcion']) ?></textarea>
  <input type="date" name="fecha_inicio" value="<?= $evento['fecha_inicio'] ?>" required>
  <input type="date" name="fecha_fin" value="<?= $evento['fecha_fin'] ?>" required>
  <input name="imagen" value="<?= htmlspecialchars($evento['imagen']) ?>" required>
  <button type="submit">Guardar cambios</button>
</form>
