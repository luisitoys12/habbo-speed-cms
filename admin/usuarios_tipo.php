<?php
require_once '../config/database.php'; // Tu conexión original
session_start();

// Verifica si el usuario tiene permisos de administrador
if (!isset($_SESSION['admin'])) {
  echo "Acceso denegado.";
  exit;
}

// Actualizar tipo si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario_id'], $_POST['tipo'])) {
  $usuario_id = intval($_POST['usuario_id']);
  $tipo = $_POST['tipo'];

  $stmt = $conn->prepare("UPDATE usuarios SET tipo = ? WHERE id = ?");
  $stmt->bind_param("si", $tipo, $usuario_id);
  $stmt->execute();
}

// Obtener lista de usuarios
$result = $conn->query("SELECT id, nombre, tipo FROM usuarios ORDER BY nombre ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asignar Tipo de Usuario</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f9f9f9; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    select { padding: 5px; }
    input[type="submit"] { padding: 5px 10px; background: #2196F3; color: white; border: none; cursor: pointer; }
  </style>
</head>
<body>
  <h1>👥 Asignar Tipo de Usuario</h1>
  <p>Usa este panel para marcar usuarios como <strong>personal</strong> (✅), <strong>invitado</strong> (🌸) o <strong>oyente</strong>.</p>

  <table>
    <tr>
      <th>Nombre</th>
      <th>Tipo actual</th>
      <th>Actualizar</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['nombre']) ?></td>
        <td><?= htmlspecialchars($row['tipo']) ?></td>
        <td>
          <form method="POST">
            <input type="hidden" name="usuario_id" value="<?= $row['id'] ?>">
            <select name="tipo">
              <option value="personal" <?= $row['tipo'] === 'personal' ? 'selected' : '' ?>>✅ Personal</option>
              <option value="invitado" <?= $row['tipo'] === 'invitado' ? 'selected' : '' ?>>🌸 Invitado</option>
              <option value="oyente" <?= $row['tipo'] === 'oyente' ? 'selected' : '' ?>>Oyente</option>
            </select>
            <input type="submit" value="Actualizar">
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
