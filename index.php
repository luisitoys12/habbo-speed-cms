<?php
if (file_exists('.index')) {
  include('maintenance.php');
  exit();
}

require_once 'includes/header.php';
include 'modules/slides.php';
include 'modules/radio.php';
include 'modules/noticias.php';
include 'modules/eventos.php';
require_once 'includes/footer.php';
