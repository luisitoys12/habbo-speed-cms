<?php
$conn = new mysqli("localhost", "usuario", "contraseña", "habbospeed");

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
