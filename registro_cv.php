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
  <div class="col-md-6">
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
  const area = document.getElementById("area").value;
  const archivo = document.getElementById("cv").files[0];
  const mensaje = document.getElementById("mensaje");

  if (!archivo || !['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'].includes(archivo.type)) {
    mensaje.innerHTML = '<div class="alert alert-danger">Formato de archivo no permitido.</div>';
    return;
  }

  if (archivo.size > 10 * 1024 * 1024) {
    mensaje.innerHTML = '<div class="alert alert-danger">El archivo supera los 10MB.</div>';
    return;
  }

  postulantes.push({ nombre, correo, area, archivo: archivo.name });
  localStorage.setItem("postulantes", JSON.stringify(postulantes));
  mensaje.innerHTML = '<div class="alert alert-success">¡CV enviado correctamente!</div>';
  document.getElementById("formCV").reset();
});
</script>

<?php include 'includes/footer.php'; ?>
