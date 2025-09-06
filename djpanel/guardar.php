<?php
include('../config/db.php');

$id = $_POST['id'];
$frase = $_POST['frase'];
$color = $_POST['color_fondo'];
$emoji = $_POST['emoji'];
$redes = $_POST['redes'];

$imagen_extra = null;
if ($_FILES['imagen_extra']['name']) {
  $nombre_archivo = uniqid() . "_" . $_FILES['imagen_extra']['name'];
  move_uploaded_file($_FILES['imagen_extra']['tmp_name'], "../uploads/" . $nombre_archivo);
  $imagen_extra = "uploads/" . $nombre_archivo;
}

$stmt = $conn->prepare("UPDATE djs SET frase=?, color_fondo=?, emoji=?, redes=?, imagen_extra=? WHERE id=?");
$stmt->bind_param("sssssi", $frase, $color, $emoji, $redes, $imagen_extra, $id);
$stmt->execute();

header("Location: index.php?id=$id&guardado=1");
