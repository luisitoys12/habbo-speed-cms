<?php
include('../config/db.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$habbo_user = $_POST['habbo_user'];
$estilo = $_POST['estilo'];
$horario = $_POST['horario'];
$frase = $_POST['frase'];
$color = $_POST['color_fondo'];
$emoji = $_POST['emoji'];
$redes = $_POST['redes'];

// Imagen extra
$imagen_extra = null;
if ($_FILES['imagen_extra']['name']) {
  $nombre_archivo = uniqid() . "_" . $_FILES['imagen_extra']['name'];
  move_uploaded_file($_FILES['imagen_extra']['tmp_name'], "../uploads/" . $nombre_archivo);
  $imagen_extra = "uploads/" . $nombre_archivo;
}

// Actualizar
$stmt = $conn->prepare("UPDATE djs SET nombre=?, habbo_user=?, estilo=?, horario=?, frase=?, color_fondo=?, emoji=?, redes=?, imagen_extra=? WHERE id=?");
$stmt->bind_param("sssssssssi", $nombre, $habbo_user, $estilo, $horario, $frase, $color, $emoji, $redes, $imagen_extra, $id);
$stmt->execute();

header("Location: dj_editar.php?id=$id&guardado=1");
