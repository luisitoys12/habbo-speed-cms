<?php
require_once 'api/azuracast.php';
$radio = getRadioNowPlaying();
?>

<div class="radio">
  <h2>🎧 Ahora en vivo</h2>
  <p><strong><?php echo $radio['now_playing']['song']['title']; ?></strong> — <?php echo $radio['now_playing']['song']['artist']; ?></p>
  <iframe src="https://azuracast.com/player" width="100%" height="80" allow="autoplay"></iframe>
</div>
