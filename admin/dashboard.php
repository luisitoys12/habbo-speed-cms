<?php
session_start();
require_once '../config/database.php';
if (!isset($_SESSION['logged_in'])) {
  header('Location: login.php');
  exit();
}

// Contadores
$noticias = $conn->query("SELECT COUNT(*) AS total FROM noticias")->fetch_assoc()['total'];
$eventos = $conn->query("SELECT COUNT(*) AS total FROM eventos")->fetch_assoc()['total'];
$djs = $conn->query("SELECT COUNT(*) AS total FROM djs")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel — Habbospeed</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="dashboard">
    <h1>📊 Estadísticas del CMS</h1>
    <canvas id="statsChart" width="400" height="200"></canvas>
    <script>
      const ctx = document.getElementById('statsChart').getContext('2d');
      const statsChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Noticias', 'Eventos', 'DJs'],
          datasets: [{
            label: 'Cantidad',
            data: [<?= $noticias ?>, <?= $eventos ?>, <?= $djs ?>],
            backgroundColor: ['#00c3ff', '#ff4081', '#ffc107']
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: { beginAtZero: true }
          }
        }
      });
    </script>
    <nav>
      <a href="noticias/">📰 Noticias</a>
      <a href="eventos/">🎉 Eventos</a>
      <a href="djs/">🎧 DJs</a>
      <a href="slides/">🖼️ Slides</a>
      <a href="logout.php">🔓 Cerrar sesión</a>
    </nav>
  </div>
</body>
</html>
