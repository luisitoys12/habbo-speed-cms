<?php
require_once '../../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $habbo_user = $_POST['habbo_user'];
  $inicio = $_POST['horario_inicio'];
  $fin = $_POST['horario_fin'];
  $programa = $_POST['programa'];

  $stmt = $conn->prepare("INSERT INTO djs (nombre, habbo_user, horario_inicio, horario_fin, programa) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $nombre, $habbo_user, $inicio, $fin, $programa);
  $stmt->execute();
  header('Location: index.php');
}
?>

<h2>➕ Agregar DJ</h2>
<form method="POST">
  <input name="nombre" placeholder="Nombre DJ" required>
  <input name="habbo_user" placeholder="Usuario Habbo" required>
  <input type="time" name="horario_inicio" required>
  <input type="time" name="horario_fin" required>
  <input name="programa" placeholder="Programa" required>
  <button type="submit">Guardar</button>
</form>
