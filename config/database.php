<?php
$conn = new mysqli("localhost", "phdcpjffyn", "x5c78bvHZG", "phdcpjffyn");

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
