<?php
function getAzuraCastNowPlaying(string $stationUrl): array {
  $endpoint = rtrim($stationUrl, '/') . '/api/nowplaying';
  $context = stream_context_create([
    'http' => ['timeout' => 3],
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
  ]);

  $json = @file_get_contents($endpoint, false, $context);
  if ($json === false) {
    return [
      'live' => ['is_live' => false],
      'listeners' => ['total' => 0],
      'now_playing' => ['song' => ['title' => 'Sin datos', 'artist' => 'Sistema']],
    ];
  }

  $parsed = json_decode($json, true);
  if (!is_array($parsed)) {
    return [
      'live' => ['is_live' => false],
      'listeners' => ['total' => 0],
      'now_playing' => ['song' => ['title' => 'Sin datos', 'artist' => 'Sistema']],
    ];
  }

  return $parsed;
}
