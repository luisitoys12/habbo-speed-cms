<?php
require_once '../../config/database.php';
session_start();
$result = $conn->query("SELECT * FROM noticias ORDER BY fecha DESC");
?>

<h2>📰 Noticias</h2>
<a href="crear.php">➕ Crear nueva</a>
<table>
  <tr><th>Título</th><th>Fecha</th><th>Acciones</th></tr>
  <?php while ($n = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo $n['titulo']; ?></td>
      <td><?php echo $n['fecha']; ?></td>
      <td>
        <a href="editar.php?id=<?php echo $n['id']; ?>">✏️</a>
        <a href="eliminar.php?id=<?php echo $n['id']; ?>">🗑️</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
