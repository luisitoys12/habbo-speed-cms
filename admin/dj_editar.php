<?php
// Conexión
include('../config/db.php');

// Obtener DJ por ID
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM djs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$dj = $stmt->get_result()->fetch_assoc();
?>

<form method="POST" enctype="multipart/form-data" action="dj_guardar.php">
  <input type="hidden" name="id" value="<?= $dj['id'] ?>">

  <label>Nombre DJ:</label>
  <input type="text" name="nombre" value="<?= $dj['nombre'] ?>" required>

  <label>Usuario Habbo:</label>
  <input type="text" name="habbo_user" value="<?= $dj['habbo_user'] ?>" required>

  <label>Estilo musical:</label>
  <input type="text" name="estilo" value="<?= $dj['estilo'] ?>">

  <label>Horario:</label>
  <input type="text" name="horario" value="<?= $dj['horario'] ?>">

  <label>Frase personal:</label>
  <textarea name="frase"><?= $dj['frase'] ?></textarea>

  <label>Color de fondo:</label>
  <input type="color" name="color_fondo" value="<?= $dj['color_fondo'] ?: '#ffffff' ?>">

  <label>Emoji favorito:</label>
  <input type="text" name="emoji" value="<?= $dj['emoji'] ?>" maxlength="2">

  <label>Redes sociales:</label>
  <input type="text" name="redes" value="<?= $dj['redes'] ?>">

  <label>Imagen extra (opcional):</label>
  <input type="file" name="imagen_extra">

  <button type="submit">Guardar perfil</button>
</form>
