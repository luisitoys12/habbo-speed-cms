<?php
require_once '../../config/database.php';
session_start();

$djs = $conn->query("SELECT id, nombre FROM djs");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dj_id = $_POST['dj_id'];
  $fecha = $_POST['fecha'];
  $inicio = $_POST['hora_inicio'];
  $fin = $_POST['hora_fin'];
  $programa = $_POST['programa'];

  $stmt = $conn->prepare("INSERT INTO djs_agenda (dj_id, fecha, hora_inicio, hora_fin, programa) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("issss", $dj_id, $fecha, $inicio, $fin, $programa);
  $stmt->execute();
  header('Location: index.php');
}
?>

<h2>📅 Agendar horario</h2>
<form method="POST">
  <select name="dj_id" required>
    <option value="">Selecciona DJ</option>
    <?php while ($dj = $djs->fetch_assoc()): ?>
      <option value="<?= $dj['id'] ?>"><?= $dj['nombre'] ?></option>
    <?php endwhile; ?>
  </select>
  <input type="date" name="fecha" required>
  <input type="time" name="hora_inicio" required>
  <input type="time" name="hora_fin" required>
  <input name="programa" placeholder="Programa" required>
  <button type="submit">Agendar</button>
</form>
