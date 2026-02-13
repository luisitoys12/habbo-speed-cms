<?php
session_start();
require_once '../config/database.php';
if (!isset($_SESSION['logged_in'])) {
  header('Location: login.php');
  exit();
}

function safeCount(?mysqli $conn, string $table): int {
  if (!$conn) {
    return 0;
  }

  $result = $conn->query("SELECT COUNT(*) AS total FROM {$table}");
  if (!$result instanceof mysqli_result) {
    return 0;
  }

  $row = $result->fetch_assoc();
  return (int) ($row['total'] ?? 0);
}

$noticias = safeCount($conn, 'noticias');
$eventos = safeCount($conn, 'eventos');
$djs = safeCount($conn, 'djs');
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
    <?php if (!empty($db_error)): ?>
      <p style="color:#ffd27a;">⚠️ <?= htmlspecialchars($db_error) ?></p>
    <?php endif; ?>
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
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
      });
    </script>
    <nav>
      <a href="noticias/">📰 Noticias</a> |
      <a href="eventos/">🎉 Eventos</a> |
      <a href="../djpanel/">🎧 DJs</a> |
      <a href="slides/">🖼️ Slides</a> |
      <a href="logout.php">🔓 Cerrar sesión</a>
    </nav>
  </div>
</body>
</html>
