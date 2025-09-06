<?php
require_once '../../config/database.php';
session_start();

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit(); }

$result = $conn->prepare("SELECT * FROM noticias WHERE id = ?");
$result->bind_param("i", $id);
$result->execute();
$noticia = $result->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $contenido = $_POST['contenido'];
  $stmt = $conn->prepare("UPDATE noticias SET titulo = ?, contenido = ? WHERE id = ?");
  $stmt->bind_param("ssi", $titulo, $contenido, $id);
  $stmt->execute();
  header('Location: index.php');
  exit();
}
?>

<h2>✏️ Editar noticia</h2>
<form method="POST">
  <input name="titulo" value="<?= htmlspecialchars($noticia['titulo']) ?>" required>
  <textarea name="contenido" required><?= htmlspecialchars($noticia['contenido']) ?></textarea>
  <button type="submit">Guardar cambios</button>
</form>
<a href="index.php">⬅️ Volver</a>
