<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TodoTickets — Compra tus entradas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="assets/css/estilos.css" rel="stylesheet">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4" href="index.php">
        <i class="bi bi-ticket-perforated-fill text-warning me-2"></i>TodoTickets
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="eventos.php">Eventos</a></li>
          <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
        </ul>
        <ul class="navbar-nav align-items-center">
          <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-person-circle me-1"></i>Iniciar sesión</a></li>
          <li class="nav-item"><a class="btn btn-warning ms-2 px-4" href="registro.php">Registrarse</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO: TÍTULO + BUSCADOR -->
  <section class="seccion-hero">
    <div class="container text-center">
      <h1 class="hero-titulo fw-bold mb-3">Compra tus <span class="text-warning">entradas</span></h1>
      <p class="lead text-muted mb-4">No te pierdas ningún evento, adquiere tus entradas para deportes, conciertos, teatro y más.</p>
      <div class="card border-0 shadow-sm p-3 mx-auto buscador-card">
        <div class="row g-2 align-items-center">
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
              <input type="text" class="form-control border-start-0" placeholder="¿Qué evento buscas?">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select">
              <option value="">Categoría</option>
              <option>Fútbol</option>
              <option>Baloncesto</option>
              <option>Boxeo</option>
              <option>Conciertos</option>
              <option>Teatro</option>
              <option>Monster Truck</option>
            </select>
          </div>
          <div class="col-md-3">
            <input type="date" class="form-control">
          </div>
          <div class="col-md-2">
            <button class="btn btn-warning w-100 fw-bold">Buscar</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CARRUSEL -->
  <section class="seccion-carrusel">
    <div class="container">
      <div id="heroCarousel" class="carousel slide rounded-3 overflow-hidden shadow-lg" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/futbol.jpg" class="carrusel-img" alt="Fútbol">
          </div>
          <div class="carousel-item">
            <img src="assets/img/baloncesto.jpg" class="carrusel-img" alt="Baloncesto">
          </div>
          <div class="carousel-item">
            <img src="assets/img/boxeo.webp" class="carrusel-img" alt="Boxeo">
          </div>
          <div class="carousel-item">
            <img src="assets/img/concierto.jpg" class="carrusel-img" alt="Conciertos">
          </div>
          <div class="carousel-item">
            <img src="assets/img/teatro.jpg" class="carrusel-img" alt="Teatro">
          </div>
          <div class="carousel-item">
            <img src="assets/img/monstertruck.jpg" class="carrusel-img" alt="Monster Truck">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="5"></button>
        </div>
      </div>
    </div>
  </section>

  <!-- CATEGORÍAS -->
  <section class="seccion-categorias py-5 bg-light">
    <div class="container">
      <div class="row g-3 justify-content-center">

        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=futbol" class="categoria-link">
            <img src="assets/img/futbol.jpg" alt="Fútbol">
            <span><i class="bi bi-dribbble me-1"></i>Fútbol</span>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=baloncesto" class="categoria-link">
            <img src="assets/img/baloncesto.jpg" alt="Baloncesto">
            <span><i class="bi bi-dribbble me-1"></i>Baloncesto</span>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=boxeo" class="categoria-link">
            <img src="assets/img/boxeo.webp" alt="Boxeo">
            <span><i class="bi bi-trophy me-1"></i>Boxeo</span>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=concierto" class="categoria-link">
            <img src="assets/img/concierto.jpg" alt="Conciertos">
            <span><i class="bi bi-music-note-beamed me-1"></i>Conciertos</span>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=teatro" class="categoria-link">
            <img src="assets/img/teatro.jpg" alt="Teatro">
            <span><i class="bi bi-camera-reels me-1"></i>Teatro</span>
          </a>
        </div>

        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=monster-truck" class="categoria-link">
            <img src="assets/img/monstertruck.jpg" alt="Monster Truck">
            <span><i class="bi bi-truck me-1"></i>Monster Truck</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-dark text-white text-center py-4 mt-5">
    <p class="mb-0">&copy; 2026 TodoTickets — Javier Caballero Miras</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>