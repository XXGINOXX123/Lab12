<?php
// index.php - Página principal sin includes
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ElectroPerú | Tecnología para tu hogar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/estilos.css" />
</head>
<body>

  <main class="container my-5 text-center">
    <h1>Bienvenido a ElectroPerú</h1>
    <p class="lead">Tu tienda confiable de electrodomésticos</p>

    <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
      <a href="login.php" class="btn btn-primary btn-lg">Iniciar sesión</a>
      <a href="contacto.php" class="btn btn-secondary btn-lg">Contacto</a>
      <a href="nosotros.php" class="btn btn-info btn-lg text-white">Nosotros</a>
      <a href="servicios.php" class="btn btn-success btn-lg">Servicios</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
