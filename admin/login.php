<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  if ($user === 'admin' && $pass === 'kusito123') {
    $_SESSION['logged_in'] = true;
    header('Location: dashboard.php');
    exit();
  } else {
    $error = "Credenciales incorrectas";
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login Staff — Habbospeed</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="login">
    <h1>🔐 Acceso Staff</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Usuario">
      <input type="password" name="password" placeholder="Contraseña">
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
