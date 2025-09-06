<?php
require_once '../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $inicio = $_POST['fecha_inicio'];
  $fin = $_POST['fecha_fin'];
  $imagen = $_POST['imagen'];

  $stmt = $conn->prepare("INSERT INTO eventos (titulo, descripcion, fecha_inicio, fecha_fin, imagen) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $titulo, $descripcion, $inicio, $fin, $imagen);
  $stmt->execute();
  header('Location: index.php');
}
?>

<h2>➕ Crear evento</h2>
<form method="POST">
  <input name="titulo" placeholder="Título" required>
  <textarea name="descripcion" placeholder="Descripción" required></textarea>
  <input type="date" name="fecha_inicio" required>
  <input type="date" name="fecha_fin" required>
  <input name="imagen" placeholder="Nombre de imagen (ej. evento1.jpg)" required>
  <button type="submit">Guardar</button>
</form>
