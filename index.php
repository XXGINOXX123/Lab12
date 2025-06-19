<?php include 'includes/header.php'; ?>
<link href="css/homepage.css" rel="stylesheet">
</head>

<body>
  <!-- Sección Hero -->
  <section class="hero-section">
    <div class="hero-content">
      <div class="container">
        <img src="img/imagen1.jpeg" alt="Logo Cybertel" class="hero-logo mb-4">
        <h1>Bienvenido a CYBERTEL</h1>
        <p class="lead">Somos una empresa líder en soluciones tecnológicas, especializada en la gestión de talento humano y el desarrollo de plataformas digitales.</p>
      </div>
    </div>
  </section>

  <!-- Contenido Principal -->
  <div class="container">
    <div class="main-content">
      <!-- Sección de Servicios -->
      <section>
        <h3 class="section-title">Nuestros Servicios</h3>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="service-card">
              <div class="text-center">
                <i class="bi bi-code-slash service-icon"></i>
              </div>
              <h5 class="card-title text-center">Desarrollo de Software</h5>
              <p class="card-text text-center">Creamos soluciones digitales a medida para empresas de todos los tamaños.</p>
            </div>
          </div>
          <div class="col">
            <div class="service-card">
              <div class="text-center">
                <i class="bi bi-arrows-angle-expand service-icon"></i>
              </div>
              <h5 class="card-title text-center">Transformación Digital</h5>
              <p class="card-text text-center">Asesoramos a empresas en su proceso de modernización tecnológica.</p>
            </div>
          </div>
          <div class="col">
            <div class="service-card">
              <div class="text-center">
                <i class="bi bi-people service-icon"></i>
              </div>
              <h5 class="card-title text-center">Reclutamiento y Selección</h5>
              <p class="card-text text-center">Plataformas inteligentes para atraer y gestionar talento humano.</p>
            </div>
          </div>
          <div class="col">
            <div class="service-card">
              <div class="text-center">
                <i class="bi bi-gear service-icon"></i>
              </div>
              <h5 class="card-title text-center">Automatización Empresarial</h5>
              <p class="card-text text-center">Optimizamos procesos internos mediante herramientas digitales.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Sección de Testimonios -->
      <section class="mt-5">
        <h3 class="section-title">Testimonios</h3>
        <div class="row">
          <div class="col-md-6">
            <div class="testimonial-card">
              <blockquote class="blockquote mb-0">
                <p><i class="bi bi-quote text-muted me-2"></i>"Gracias a CYBERTEL, optimizamos nuestro proceso de selección en un 70%."</p>
                <footer class="blockquote-footer mt-3">
                  <strong>Recursos Humanos</strong>, TechCorp
                </footer>
              </blockquote>
            </div>
          </div>
          <div class="col-md-6">
            <div class="testimonial-card">
              <blockquote class="blockquote mb-0">
                <p><i class="bi bi-quote text-muted me-2"></i>"La plataforma de CVs es intuitiva y eficiente. ¡Muy recomendada!"</p>
                <footer class="blockquote-footer mt-3">
                  <strong>Gerente de Talento</strong>, Innovatech
                </footer>
              </blockquote>
            </div>
          </div>
        </div>
      </section>

      <!-- Sección de Noticias -->
      <section class="mt-5">
        <h3 class="section-title">Últimas Noticias</h3>
        <div class="news-card">
          <div class="card-body p-4">
            <div class="row align-items-center">
              <div class="col-md-2 text-center">
                <i class="bi bi-newspaper text-primary" style="font-size: 3rem;"></i>
              </div>
              <div class="col-md-8">
                <h5 class="card-title mb-2">CYBERTEL lanza nueva plataforma de entrevistas virtuales</h5>
                <p class="card-text text-muted">La nueva herramienta permite realizar entrevistas en línea con análisis de lenguaje corporal y voz.</p>
              </div>
              <div class="col-md-2 text-center">
                <a href="#" class="btn btn-outline-custom">Leer más</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Llamado a la acción -->
    <section class="cta-section">
      <div class="container">
        <h4>¿Quieres formar parte de nuestro equipo?</h4>
        <p class="lead mb-4">Explora nuestras oportunidades laborales y postula con tu CV.</p>
        <a href="registro_cv.php" class="btn btn-custom btn-lg">
          <i class="bi bi-upload me-2"></i>Postula Aquí
        </a>
      </div>
    </section>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <?php include 'includes/footer.php'; ?>
