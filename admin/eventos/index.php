<?php
require_once '../../config/database.php';
session_start();

$buscar = $_GET['buscar'] ?? '';
$sql = "SELECT * FROM eventos WHERE titulo LIKE '%$buscar%' ORDER BY fecha_inicio DESC";
$result = $conn->query($sql);
?>

<h2>🎉 Eventos</h2>
<a href="crear.php">➕ Crear evento</a>
<form method="GET">
  <input type="text" name="buscar" placeholder="Buscar evento..." value="<?= htmlspecialchars($buscar) ?>">
  <button type="submit">🔍 Buscar</button>
</form>

<table>
  <tr><th>Título</th><th>Inicio</th><th>Fin</th><th>Acciones</th></tr>
  <?php while ($e = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($e['titulo']) ?></td>
      <td><?= $e['fecha_inicio'] ?></td>
      <td><?= $e['fecha_fin'] ?></td>
      <td>
        <a href="editar.php?id=<?= $e['id'] ?>">✏️</a>
        <a href="eliminar.php?id=<?= $e['id'] ?>">🗑️</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
