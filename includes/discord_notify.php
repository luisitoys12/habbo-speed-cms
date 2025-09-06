<?php
function notifyDiscord($mensaje) {
  $webhook = "https://discord.com/api/webhooks/tu_webhook_id";
  $data = json_encode(["content" => $mensaje]);

  $ch = curl_init($webhook);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_exec($ch);
  curl_close($ch);
}
