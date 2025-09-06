<?php
require_once 'config/database.php';
$query = $conn->query("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 5");
?>

<div class="noticias">
  <h2>📰 Últimas noticias</h2>
  <?php while ($n = $query->fetch_assoc()): ?>
    <div class="noticia">
      <h3><?php echo $n['titulo']; ?></h3>
      <p><?php echo $n['contenido']; ?></p>
      <small><?php echo date('d M Y', strtotime($n['fecha'])); ?></small>
    </div>
  <?php endwhile; ?>
</div>
