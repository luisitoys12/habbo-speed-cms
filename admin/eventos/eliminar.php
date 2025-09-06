<?php
require_once '../../config/database.php';
session_start();

$id = $_GET['id'] ?? null;
if ($id) {
  $stmt = $conn->prepare("DELETE FROM eventos WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}
header('Location: index.php');
