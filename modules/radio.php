<?php
require_once 'config/database.php';
require_once 'api/habbo.php';
require_once 'api/azuracast.php';

$station_url = 'https://azuracast.com';
$data = getAzuraCastNowPlaying($station_url);

$current_time = date('H:i:s');
$dj = $conn->query("SELECT * FROM djs WHERE '$current_time' BETWEEN horario_inicio AND horario_fin LIMIT 1")->fetch_assoc();
$habbo = $dj ? getHabboData($dj['habbo_user']) : null;

$track = $data['now_playing']['song']['title'] ?? 'Sin título';
$artist = $data['now_playing']['song']['artist'] ?? 'Desconocido';
$listeners = $data['listeners']['total'] ?? 0;
?>

<section class="radio-player">
  <?php if ($habbo): ?>
    <img src="https://www.habbo.es/habbo-imaging/avatarimage?user=<?= urlencode($habbo['name']) ?>&direction=2&head_direction=3&size=l" alt="Avatar Habbo">
    <h2>🎧 DJ <?= htmlspecialchars($habbo['name']) ?> (Habbo.es)</h2>
    <p>Misión: "<?= htmlspecialchars($habbo['motto']) ?>"</p>
  <?php else: ?>
    <h2>🎧 AutoDJ</h2>
  <?php endif; ?>
  <p>🎵 Tema actual: <strong><?= htmlspecialchars($track) ?></strong> — <?= htmlspecialchars($artist) ?></p>
  <p>👥 Oyentes conectados: <?= $listeners ?></p>
  <span class="radio-status"><?= $data['live']['is_live'] ? '🔴 EN VIVO' : '🟡 AutoDJ' ?></span>
</section>
