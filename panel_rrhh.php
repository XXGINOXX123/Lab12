<?php include 'includes/header.php'; ?>
<h1 class="mb-4 text-center">Panel de Administración RRHH</h1>
<p class="text-center">Visualiza, edita y gestiona las postulaciones recibidas a través de la plataforma.</p>

<!-- Filtros -->
<div class="row mb-4">
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-search"></i></span>
      <input type="text" id="filtroTexto" class="form-control" placeholder="Buscar por nombre o correo">
    </div>
  </div>
  <div class="col-md-6 text-end">
    <span class="badge bg-primary">Total postulantes: <span id="totalPostulantes">0</span></span>
  </div>
</div>

<!-- Tabla de postulantes -->
<div class="table-responsive shadow-sm">
  <table class="table table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Área</th>
        <th>Archivo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tablaPostulantes">
      <!-- Se llenará dinámicamente -->
    </tbody>
  </table>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
// Datos simulados
let postulantes = [
  { nombre: "Ana Torres", correo: "ana@correo.com", area: "Marketing", archivo: "ana_cv.pdf" },
  { nombre: "Luis Pérez", correo: "luis@correo.com", area: "Tecnología", archivo: "luis_cv.docx" }
];

function renderTabla() {
  const cuerpo = document.getElementById("tablaPostulantes");
  const filtro = document.getElementById("filtroTexto").value.toLowerCase();
  const total = document.getElementById("totalPostulantes");
  cuerpo.innerHTML = "";

  const filtrados = postulantes.filter(p =>
    p.nombre.toLowerCase().includes(filtro) || p.correo.toLowerCase().includes(filtro)
  );

  total.textContent = filtrados.length;

  filtrados.forEach((p, i) => {
    cuerpo.innerHTML += `
      <tr>
        <td>${p.nombre}</td>
        <td>${p.correo}</td>
        <td>${p.area}</td>
        <td><a href="#">${p.archivo}</a></td>
        <td>
          <button class="btn btn-outline-warning btn-sm me-1" onclick="editar(${i})">
            <i class="bi bi-pencil-square"></i>
          </button>
          <button class="btn btn-outline-danger btn-sm" onclick="eliminar(${i})">
            <i class="bi bi-trash"></i>
          </button>
        </td>
      </tr>
    `;
  });
}

function editar(index) {
  const p = postulantes[index];
  const nuevoNombre = prompt("Editar nombre:", p.nombre);
  const nuevoCorreo = prompt("Editar correo:", p.correo);
  const nuevaArea = prompt("Editar área:", p.area);
  if (nuevoNombre && nuevoCorreo && nuevaArea) {
    postulantes[index] = { ...p, nombre: nuevoNombre, correo: nuevoCorreo, area: nuevaArea };
    renderTabla();
  }
}

function eliminar(index) {
  if (confirm("¿Deseas eliminar esta postulación?")) {
    postulantes.splice(index, 1);
    renderTabla();
  }
}

document.getElementById("filtroTexto").addEventListener("input", renderTabla);
renderTabla();
</script>

<?php include 'includes/footer.php'; ?>
