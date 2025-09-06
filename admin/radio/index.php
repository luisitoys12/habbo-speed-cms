<?php
require_once '../../config/database.php';
session_start();

$result = $conn->query("SELECT * FROM djs ORDER BY horario_inicio ASC");
?>

<h2>🎧 DJs</h2>
<a href="crear.php">➕ Agregar DJ</a>

<table>
  <tr><th>Nombre</th><th>Habbo</th><th>Inicio</th><th>Fin</th><th>Programa</th><th>Acciones</th></tr>
  <?php while ($dj = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($dj['nombre']) ?></td>
      <td><?= htmlspecialchars($dj['habbo_user']) ?></td>
      <td><?= $dj['horario_inicio'] ?></td>
      <td><?= $dj['horario_fin'] ?></td>
      <td><?= htmlspecialchars($dj['programa']) ?></td>
      <td>
        <a href="editar.php?id=<?= $dj['id'] ?>">✏️</a>
        <a href="eliminar.php?id=<?= $dj['id'] ?>">🗑️</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
