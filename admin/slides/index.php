<?php
require_once '../../config/database.php';
session_start();
$result = $conn->query("SELECT * FROM slides ORDER BY fecha_subida DESC");
?>

<h2>🖼️ Slides subidos</h2>
<a href="subir.php">➕ Subir nuevo</a>
<table>
  <tr><th>Imagen</th><th>Fecha</th><th>Acciones</th></tr>
  <?php while ($s = $result->fetch_assoc()): ?>
    <tr>
      <td><img src="../../assets/images/slides/<?= $s['archivo'] ?>" width="120"></td>
      <td><?= $s['fecha_subida'] ?></td>
      <td>
        <a href="eliminar.php?id=<?= $s['id'] ?>&archivo=<?= urlencode($s['archivo']) ?>">🗑️ Eliminar</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
