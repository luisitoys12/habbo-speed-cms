<?php
include('../config/db.php');
header('Content-Type: text/html; charset=utf-8');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Si no hay conexión, mostrar datos de ejemplo
if ($conn->connect_error || !$id) {
  include('ejemplo.php');
  exit();
}

// Obtener datos del DJ
$stmt = $conn->prepare("SELECT * FROM djs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$dj = $stmt->get_result()->fetch_assoc();
?>

<h2>🎧 Panel de DJ: <?= htmlspecialchars($dj['nombre']) ?></h2>

<form method="POST" enctype="multipart/form-data" action="guardar.php">
  <input type="hidden" name="id" value="<?= $dj['id'] ?>">

  <label>Frase personal:</label>
  <textarea name="frase"><?= htmlspecialchars($dj['frase']) ?></textarea>

  <label>Color de fondo:</label>
  <input type="color" name="color_fondo" value="<?= $dj['color_fondo'] ?: '#ffffff' ?>">

  <label>Emoji favorito:</label>
  <input type="text" name="emoji" value="<?= $dj['emoji'] ?>" maxlength="2">

  <label>Redes sociales:</label>
  <input type="text" name="redes" value="<?= htmlspecialchars($dj['redes']) ?>">

  <label>Imagen extra:</label>
  <input type="file" name="imagen_extra">

  <button type="submit">💾 Guardar cambios</button>
</form>

<hr>
<h3>Vista previa:</h3>
<div style="background-color: <?= $dj['color_fondo'] ?>; padding: 10px; border-radius: 10px;">
  <img src="https://www.habbo.com/habbo-imaging/avatarimage?user=<?= urlencode($dj['habbo_user']) ?>&action=std&direction=2&head_direction=2&size=l" />
  <h2><?= $dj['emoji'] ?> <?= htmlspecialchars($dj['nombre']) ?></h2>
  <p><em>"<?= htmlspecialchars($dj['frase']) ?>"</em></p>
  <p><strong>Redes:</strong> <?= htmlspecialchars($dj['redes']) ?></p>
  <?php if ($dj['imagen_extra']) : ?>
    <img src="../<?= $dj['imagen_extra'] ?>" style="max-width: 100px;" />
  <?php endif; ?>
</div>
