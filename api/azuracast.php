<?php
function getRadioNowPlaying() {
  $url = "https://azuracast.com/api/nowplaying";
  $json = file_get_contents($url);
  return json_decode($json, true);
}
