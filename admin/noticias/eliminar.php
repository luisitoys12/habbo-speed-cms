<?php
require_once '../../config/database.php';
session_start();

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit(); }

$stmt = $conn->prepare("DELETE FROM noticias WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header('Location: index.php');
exit();
