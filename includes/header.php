<?php
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Habbospeed CMS</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="site-header">
    <h1>🎛️ Habbospeed CMS</h1>
    <p>Fansite radio con panel modular</p>
  </header>
  <?php if (!empty($db_error)): ?>
    <div class="warning-banner">⚠️ <?= htmlspecialchars($db_error) ?> Se muestran datos de ejemplo mientras configuras la base de datos.</div>
  <?php endif; ?>
  <main>
