<?php
require_once '../../config/database.php';
session_start();

$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$sql = "SELECT * FROM noticias WHERE titulo LIKE '%$buscar%' ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Noticias — Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: sans-serif; padding: 20px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    a { margin-right: 8px; text-decoration: none; }
    .dark-mode { background-color: #121212; color: #eee; }
    .dark-mode table { border-color: #444; }
    .toggle-dark { position: fixed; top: 10px; right: 10px; padding: 5px 10px; background: #333; color: #fff; border: none; cursor: pointer; }
    @media (max-width: 600px) {
      table, th, td { font-size: 14px; }
      .toggle-dark { top: 5px; right: 5px; font-size: 12px; }
    }
  </style>
</head>
<body>
  <button class="toggle-dark" onclick="document.body.classList.toggle('dark-mode')">🌙 Modo oscuro</button>

  <h2>📰 Noticias</h2>
  <a href="crear.php">➕ Crear nueva</a>
  <a href="exportar.php">📤 Exportar CSV</a>

  <form method="GET" style="margin-top: 10px;">
    <input type="text" name="buscar" placeholder="Buscar título..." value="<?= htmlspecialchars($buscar) ?>">
    <button type="submit">🔍 Buscar</button>
  </form>

  <table>
    <tr><th>Título</th><th>Fecha</th><th>Acciones</th></tr>
    <?php while ($n = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($n['titulo']) ?></td>
        <td><?= $n['fecha'] ?></td>
        <td>
          <a href="editar.php?id=<?= $n['id'] ?>">✏️</a>
          <a href="eliminar.php?id=<?= $n['id'] ?>">🗑️</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
