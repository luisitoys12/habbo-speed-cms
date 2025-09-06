<?php
require_once 'config/database.php';
$query = $conn->query("SELECT * FROM eventos WHERE fecha >= CURDATE() ORDER BY fecha ASC");
?>

<div class="eventos">
  <h2>🎉 Próximos eventos</h2>
  <?php while ($e = $query->fetch_assoc()): ?>
    <div class="evento">
      <strong><?php echo $e['nombre']; ?></strong> — <?php echo date('d M Y', strtotime($e['fecha'])); ?>
      <p><?php echo $e['descripcion']; ?></p>
    </div>
  <?php endwhile; ?>
</div>
