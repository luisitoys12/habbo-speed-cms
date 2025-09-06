<?php
require_once '../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['slide'])) {
  $nombre = basename($_FILES['slide']['name']);
  $destino = '../../assets/images/slides/' . $nombre;

  if (move_uploaded_file($_FILES['slide']['tmp_name'], $destino)) {
    $fecha = date('Y-m-d');
    $stmt = $conn->prepare("INSERT INTO slides (archivo, fecha_subida) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $fecha);
    $stmt->execute();
    echo "✅ Slide subida y registrada";
  } else {
    echo "❌ Error al subir la imagen";
  }
}
?>

<h2>🖼️ Subir slide</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="slide" required>
  <button type="submit">Subir imagen</button>
</form>
<a href="index.php">⬅️ Ver slides</a>
