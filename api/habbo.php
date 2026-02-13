<?php
function getHabboData(string $username): ?array {
  $url = 'https://www.habbo.es/api/public/users?name=' . urlencode($username);
  $context = stream_context_create([
    'http' => ['timeout' => 3],
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
  ]);

  $json = @file_get_contents($url, false, $context);
  if ($json === false) {
    return null;
  }

  $data = json_decode($json, true);
  return is_array($data) ? $data : null;
}
