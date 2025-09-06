<?php
function getHabboData($username) {
  $url = "https://www.habbo.es/api/public/users?name=" . urlencode($username);
  $json = file_get_contents($url);
  return json_decode($json, true);
}
