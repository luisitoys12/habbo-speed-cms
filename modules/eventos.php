<?php
require_once 'config/database.php';
$stmt = $conn->query("SELECT * FROM eventos WHERE fecha_fin >= CURDATE() ORDER BY fecha_inicio ASC");
?>

<section class="eventos">
  <h2>🎟️ Próximos eventos</h2>
  <?php while ($evento = $stmt->fetch_assoc()): ?>
    <article>
      <h3><?= htmlspecialchars($evento['titulo']) ?></h3>
      <img src="assets/images/slides/<?= htmlspecialchars($evento['imagen']) ?>" width="100%" style="border-radius:8px;">
      <p><?= htmlspecialchars($evento['descripcion']) ?></p>
      <small>Del <?= $evento['fecha_inicio'] ?> al <?= $evento['fecha_fin'] ?></small>
    </article>
  <?php endwhile; ?>
</section>
