<?php
session_start();

// Simulamos base de datos con usuarios (en un caso real, consulta BD)
$usuarios = [
    'admin@example.com' => ['nombre' => 'Administrador', 'password' => '1234'], 
];

// Inicializa variables
$error = '';
$modoRegistro = isset($_GET['registro']); // ?registro para mostrar formulario registro

// Manejar logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Manejar login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validar usuario
    if (isset($usuarios[$correo]) && $usuarios[$correo]['password'] === $password) {
        $_SESSION['usuario'] = [
            'correo' => $correo,
            'nombre' => $usuarios[$correo]['nombre']
        ];
        header('Location: login.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

// Manejar registro (muy básico)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre && $correo && $password) {
        if (isset($usuarios[$correo])) {
            $error = "El correo ya está registrado.";
        } else {
            // En app real, guardar en DB y hashear password
            $usuarios[$correo] = ['nombre' => $nombre, 'password' => $password];
            header('Location: login.php');
            exit;
        }
    } else {
        $error = "Completa todos los campos.";
    }
}

$usuario = $_SESSION['usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Login Admin PHP</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; }
    .container { max-width: 400px; margin: 3em auto; background: white; padding: 2em; border-radius: 8px; }
    input, button { width: 100%; padding: 0.5em; margin: 0.5em 0; }
    .error { color: red; font-weight: bold; }
    a { color: blue; text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="container">
    <?php if ($usuario): ?>
      <h2>Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?></h2>
      <p>Correo: <?= htmlspecialchars($usuario['correo']) ?></p>
      <p><a href="?logout=1">Cerrar sesión</a></p>
      <p><a href="/mis-pedidos.php">Ver pedidos anteriores</a></p>
    <?php else: ?>
      <?php if ($modoRegistro): ?>
        <h2>Crear cuenta</h2>
        <?php if ($error) echo "<p class='error'>$error</p>" ?>
        <form method="post" action="login.php">
          <input type="text" name="nombre" placeholder="Nombre completo" required />
          <input type="email" name="correo" placeholder="Correo electrónico" required />
          <input type="password" name="password" placeholder="Contraseña" required />
          <button type="submit" name="register">Registrarme</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
      <?php else: ?>
        <h2>Iniciar sesión</h2>
        <?php if ($error) echo "<p class='error'>$error</p>" ?>
        <form method="post" action="login.php">
          <input type="email" name="correo" placeholder="Correo electrónico" required />
          <input type="password" name="password" placeholder="Contraseña" required />
          <button type="submit" name="login">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="?registro=1">Crear cuenta</a></p>
      <?php endif ?>
    <?php endif ?>
  </div>
</body>
</html>
