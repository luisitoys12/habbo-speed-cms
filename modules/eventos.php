<?php
require_once __DIR__ . '/../config/database.php';

$eventos = [];
if ($conn instanceof mysqli) {
  $stmt = $conn->query('SELECT * FROM eventos WHERE fecha_fin >= CURDATE() ORDER BY fecha_inicio ASC');
  if ($stmt instanceof mysqli_result) {
    while ($row = $stmt->fetch_assoc()) {
      $eventos[] = $row;
    }
  }
}

if (!$eventos) {
  $eventos = [[
    'titulo' => 'Evento de lanzamiento',
    'imagen' => '',
    'descripcion' => 'Personaliza tus eventos desde el panel cuando la base de datos esté conectada.',
    'fecha_inicio' => date('Y-m-d'),
    'fecha_fin' => date('Y-m-d', strtotime('+7 days')),
  ]];
}
?>

<section class="eventos">
  <h2>🎟️ Próximos eventos</h2>
  <?php foreach ($eventos as $evento): ?>
    <article>
      <h3><?= htmlspecialchars($evento['titulo']) ?></h3>
      <?php if (!empty($evento['imagen'])): ?>
        <img src="assets/images/slides/<?= htmlspecialchars($evento['imagen']) ?>" width="100%" style="border-radius:8px;" alt="<?= htmlspecialchars($evento['titulo']) ?>">
      <?php endif; ?>
      <p><?= htmlspecialchars($evento['descripcion']) ?></p>
      <small>Del <?= htmlspecialchars($evento['fecha_inicio']) ?> al <?= htmlspecialchars($evento['fecha_fin']) ?></small>
    </article>
  <?php endforeach; ?>
</section>
