<?php
require_once '../../config/database.php';
session_start();

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit(); }

$result = $conn->prepare("SELECT * FROM djs WHERE id = ?");
$result->bind_param("i", $id);
$result->execute();
$dj = $result->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $habbo_user = $_POST['habbo_user'];
  $inicio = $_POST['horario_inicio'];
  $fin = $_POST['horario_fin'];
  $programa = $_POST['programa'];

  $stmt = $conn->prepare("UPDATE djs SET nombre = ?, habbo_user = ?, horario_inicio = ?, horario_fin = ?, programa = ? WHERE id = ?");
  $stmt->bind_param("sssssi", $nombre, $habbo_user, $inicio, $fin, $programa, $id);
  $stmt->execute();
  header('Location: index.php');
}
?>

<h2>✏️ Editar DJ</h2>
<form method="POST">
  <input name="nombre" value="<?= htmlspecialchars($dj['nombre']) ?>" required>
  <input name="habbo_user" value="<?= htmlspecialchars($dj['habbo_user']) ?>" required>
  <input type="time" name="horario_inicio" value="<?= $dj['horario_inicio'] ?>" required>
  <input type="time" name="horario_fin" value="<?= $dj['horario_fin'] ?>" required>
  <input name="programa" value="<?= htmlspecialchars($dj['programa']) ?>" required>
  <button type="submit">Guardar cambios</button>
</form>
