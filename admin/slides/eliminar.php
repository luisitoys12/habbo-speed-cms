<?php
require_once '../../config/database.php';
session_start();

$id = $_GET['id'] ?? null;
$archivo = $_GET['archivo'] ?? null;

if ($id && $archivo) {
  $ruta = '../../assets/images/slides/' . $archivo;
  if (file_exists($ruta)) {
    unlink($ruta);
  }

  $stmt = $conn->prepare("DELETE FROM slides WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

header('Location: index.php');
exit();
