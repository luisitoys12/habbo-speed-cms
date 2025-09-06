<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel — Habbospeed</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="dashboard">
    <h1>🎮 Panel de administración</h1>
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
