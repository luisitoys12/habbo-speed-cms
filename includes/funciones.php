<?php
function obtenerVerificacion($tipo) {
  switch ($tipo) {
    case 'personal': return '<span title="Staff" style="color:#2196F3;">✅</span>';
    case 'invitado': return '<span title="Invitado Kusito" style="color:#E91E63;">🌸</span>';
    default: return '';
  }
}

function sumarCaracolas($usuario_id, $cantidad) {
  global $conn;
  $stmt = $conn->prepare("UPDATE usuarios SET caracolas = caracolas + ? WHERE id = ?");
  $stmt->bind_param("ii", $cantidad, $usuario_id);
  $stmt->execute();
}

function asignarInsignia($usuario_id, $insignia_id) {
  global $conn;
  $stmt = $conn->prepare("SELECT COUNT(*) FROM usuario_insignia WHERE usuario_id = ? AND insignia_id = ?");
  $stmt->bind_param("ii", $usuario_id, $insignia_id);
  $stmt->execute();
  $stmt->bind_result($existe);
  $stmt->fetch();
  $stmt->close();

  if ($existe == 0) {
    $insert = $conn->prepare("INSERT INTO usuario_insignia (usuario_id, insignia_id) VALUES (?, ?)");
    $insert->bind_param("ii", $usuario_id, $insignia_id);
    $insert->execute();
  }
}
?>
