<?php include 'includes/header.php'; ?>
<h1>Iniciar Sesión</h1>
<form id="loginForm" onsubmit="return validarFormulario()">
  <input type="text" id="usuario" placeholder="Usuario" class="form-control mb-2" />
  <input type="password" id="password" placeholder="Contraseña" class="form-control mb-2" />
  <button class="btn btn-primary" type="submit">Entrar</button>
</form>

<script>
  function validarFormulario() {
    const usuario = document.getElementById('usuario').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!usuario || !password) {
      alert('Por favor, ingresa usuario y contraseña.');
      return false; // Detiene el envío del formulario
    }
    return true; // Permite enviar el formulario si está todo OK
  }
</script>

<?php include 'includes/footer.php'; ?>
