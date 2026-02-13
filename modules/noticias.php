<?php
require_once __DIR__ . '/../config/database.php';

$noticias = [];
if ($conn instanceof mysqli) {
  $query = $conn->query('SELECT * FROM noticias ORDER BY fecha DESC LIMIT 5');
  if ($query instanceof mysqli_result) {
    while ($row = $query->fetch_assoc()) {
      $noticias[] = $row;
    }
  }
}

if (!$noticias) {
  $noticias = [[
    'titulo' => 'Bienvenido a Habbospeed CMS',
    'contenido' => 'Configura tu base de datos para publicar noticias reales desde el panel de administración.',
    'fecha' => date('Y-m-d'),
  ]];
}
?>

<div class="noticias">
  <h2>📰 Últimas noticias</h2>
  <?php foreach ($noticias as $n): ?>
    <div class="noticia">
      <h3><?= htmlspecialchars($n['titulo']) ?></h3>
      <p><?= htmlspecialchars($n['contenido']) ?></p>
      <small><?= date('d M Y', strtotime($n['fecha'])) ?></small>
    </div>
  <?php endforeach; ?>
</div>
