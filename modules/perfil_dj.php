<?php
require_once '../config/database.php';
$id = $_GET['id'] ?? null;
if (!$id) { echo "DJ no encontrado"; exit(); }

$dj = $conn->query("SELECT * FROM djs WHERE id = $id")->fetch_assoc();
$agenda = $conn->query("SELECT * FROM djs_agenda WHERE dj_id = $id ORDER BY fecha, hora_inicio");
?>

<h2><?= $dj['nombre'] ?> 🎧</h2>
<p><strong>Usuario Habbo:</strong> <?= $dj['habbo_user'] ?></p>
<p><strong>Programa:</strong> <?= $dj['programa'] ?></p>

<h3>📅 Horarios agendados</h3>
<ul>
  <?php while ($slot = $agenda->fetch_assoc()): ?>
    <li>
      <?= date("d M", strtotime($slot['fecha'])) ?> —  
      <?= date("H:i", strtotime($slot['hora_inicio'])) ?> a <?= date("H:i", strtotime($slot['hora_fin'])) ?>  
      <em>(<?= $slot['programa'] ?>)</em>
    </li>
  <?php endwhile; ?>
</ul>
