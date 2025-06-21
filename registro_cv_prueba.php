<?php include 'includes/header.php'; ?>
<h1>Registro de CV</h1>
<p>Completa el formulario para postular a una vacante en CYBERTEL.</p>

<form id="formCV" class="row g-3" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="nombre" class="form-label">Nombre completo</label>
    <input type="text" class="form-control" id="nombre" required>
  </div>
  <div class="col-md-6">
    <label for="correo" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="correo" required>
  </div>
  <div class="col-md-4">
    <label for="telefono" class="form-label">Teléfono</label>
    <input type="tel" class="form-control" id="telefono" placeholder="Ej: 987654321" required>
  </div>
  <div class="col-md-4">
    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="fecha_nacimiento" required>
  </div>
  <div class="col-md-4">
    <label for="area" class="form-label">Área de interés</label>
    <select class="form-select" id="area" required>
      <option value="">Selecciona una opción</option>
      <option value="Marketing">Marketing</option>
      <option value="Tecnología">Tecnología</option>
      <option value="RRHH">Recursos Humanos</option>
      <option value="Ventas">Ventas</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="cv" class="form-label">Sube tu CV</label>
    <input type="file" class="form-control" id="cv" accept=".pdf,.doc,.docx" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-success">Enviar Postulación</button>
  </div>
</form>

<div id="mensaje" class="mt-3"></div>

<script>
  let postulantes = JSON.parse(localStorage.getItem("postulantes")) || [];

  document.getElementById("formCV").addEventListener("submit", function(e) {
    e.preventDefault();

    const nombre = document.getElementById("nombre").value.trim();
    const correo = document.getElementById("correo").value.trim();
    const telefono = document.getElementById("telefono").value.trim();
    const fechaNacimiento = document.getElementById("fecha_nacimiento").value;
    const area = document.getElementById("area").value;
    const archivo = document.getElementById("cv").files[0];
    const mensaje = document.getElementById("mensaje");

    // Validaciones de campo vacío
    if (!nombre || !correo || !telefono || !fechaNacimiento || !area || !archivo) {
      mensaje.innerHTML = '<div class="alert alert-danger">Todos los campos son obligatorios.</div>';
      return;
    }

    // Validación de nombre
    const nombreValido = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(nombre);
    if (!nombreValido) {
      mensaje.innerHTML = '<div class="alert alert-danger">Nombre inválido. No se permiten números, puntos ni comas.</div>';
      return;
    }

    // Validación de área
    const areasValidas = ["Marketing", "Tecnología", "RRHH", "Ventas"];
    if (!areasValidas.includes(area)) {
      mensaje.innerHTML = '<div class="alert alert-danger">Área inválida. Selecciona una opción válida.</div>';
      return;
    }

    // Validación de correo
    const correoValido = /^[^.\s@][^@]*@[^@]+\.[^@]+$/.test(correo);
    if (!correoValido) {
      mensaje.innerHTML = '<div class="alert alert-danger">Correo inválido. Debe contener "@" y un dominio válido.</div>';
      return;
    }

    // Validación de teléfono (9 dígitos para Perú)
    const telefonoValido = /^[0-9]{9}$/.test(telefono);
    if (!telefonoValido) {
      mensaje.innerHTML = '<div class="alert alert-danger">Teléfono inválido. Debe tener 9 dígitos.</div>';
      return;
    }

    // Validación de fecha de nacimiento (mínimo 18 años)
    const fechaNac = new Date(fechaNacimiento);
    const hoy = new Date();
    const edadMinima = new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate());
    
    if (fechaNac > edadMinima) {
      mensaje.innerHTML = '<div class="alert alert-danger">Debes ser mayor de 18 años para postular.</div>';
      return;
    }

    // Validación de archivo
    const tiposPermitidos = [
      'application/pdf',
      'application/msword',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    if (!tiposPermitidos.includes(archivo.type)) {
      mensaje.innerHTML = '<div class="alert alert-danger">Formato de archivo no permitido. Solo PDF o Word.</div>';
      return;
    }

    if (archivo.size > 10 * 1024 * 1024) {
      mensaje.innerHTML = '<div class="alert alert-danger">El archivo supera los 10MB.</div>';
      return;
    }

    // Guardar en localStorage
    postulantes.push({
      nombre,
      correo,
      telefono,
      fechaNacimiento,
      area,
      archivo: archivo.name
    });
    localStorage.setItem("postulantes", JSON.stringify(postulantes));

    mensaje.innerHTML = '<div class="alert alert-success">¡CV enviado correctamente!</div>';
    document.getElementById("formCV").reset();
  });
</script>

<?php include 'includes/footer.php'; ?>