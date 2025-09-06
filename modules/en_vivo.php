<?php
date_default_timezone_set('America/Mexico_City');
require_once '../config/database.php';

// AzuraCast API
$azura_url = "https://tu-servidor-azuracast.com/api/nowplaying/estacion";
$azura_token = "TU_TOKEN_AQUI";

$headers = ["Accept: application/json", "Authorization: Bearer $azura_token"];
$ch = curl_init($azura_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$dj_actual = $data['live']['is_live'] ? $data['live']['streamer_name'] : "AutoDJ";
$programa = $data['now_playing']['song']['title'];
?>

<h2>🔴 En Vivo Ahora</h2>
<p><strong>DJ:</strong> <?= htmlspecialchars($dj_actual) ?></p>
<p><strong>Programa:</strong> <?= htmlspecialchars($programa) ?></p>
<p><em>Actualizado: <?= date("H:i") ?> (Hora México Central)</em></p>
