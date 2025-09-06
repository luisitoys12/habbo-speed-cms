<?php
require_once 'api/habbo.php';
$habbo = getHabboData('Kusito');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Habbospeed — Mantenimiento</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="mantenimiento">
    <img src="https://www.habbo.com/habbo-imaging/avatarimage?user=<?php echo urlencode($habbo['name']); ?>&direction=2&head_direction=3&size=l" alt="Avatar DJ">
    <h1>🚧 Habbospeed está en mantenimiento</h1>
    <p>Estamos preparando una experiencia pixelada increíble. Vuelve pronto.</p>
    <h2>🎧 DJ <?php echo $habbo['name']; ?></h2>
    <p>Misión: "<?php echo $habbo['motto']; ?>"</p>
    <iframe src="https://your-radio-url.com/player" width="100%" height="80" allow="autoplay"></iframe>
    <br><br>
    <a href="admin/login.php">🔐 Acceso Staff</a>
  </div>
</body>
</html>
