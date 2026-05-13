<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TodoTickets — Compra tus entradas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="media/css/estilos.css" rel="stylesheet">
</head>

<body>

  <?php include 'comun/navbar.php'; ?>

  <!-- HERO -->
  <section class="hero">
    <div class="container text-center">
      <h1 class="hero-titulo fw-bold mb-3">Compra tus <span class="text-warning">entradas</span></h1>
      <p class="lead text-muted mb-5">No te pierdas ningún evento, adquiere tus entradas para deportes, conciertos, teatro y más.</p>

      <!-- CARRUSEL -->
      <div id="heroCarousel" class="carousel slide rounded-3 overflow-hidden shadow-lg" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="media/img/futbol.jpg" class="d-block w-100 carrusel-img" alt="Fútbol">
          </div>
          <div class="carousel-item">
            <img src="media/img/baloncesto.jpg" class="d-block w-100 carrusel-img" alt="Baloncesto">
          </div>
          <div class="carousel-item">
            <img src="media/img/boxeo.jpg" class="d-block w-100 carrusel-img" alt="Boxeo">
          </div>
          <div class="carousel-item">
            <img src="media/img/concierto.jpg" class="d-block w-100 carrusel-img" alt="Conciertos">
          </div>
          <div class="carousel-item">
            <img src="media/img/teatro.jpg" class="d-block w-100 carrusel-img" alt="Teatro">
          </div>
          <div class="carousel-item">
            <img src="media/img/monstertruck.jpg" class="d-block w-100 carrusel-img" alt="Monster Truck">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </section>

  <!-- CATEGORÍAS -->
  <section class="seccion-categorias py-5 bg-light">
    <div class="container">
      <div class="row g-3 justify-content-center">
        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=futbol" class="categoria-link">
            <img src="media/img/futbol.jpg" alt="Fútbol">
            <span>Fútbol</span>
          </a>
        </div>
        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=baloncesto" class="categoria-link">
            <img src="media/img/baloncesto.jpg" alt="Baloncesto">
            <span>Baloncesto</span>
          </a>
        </div>
        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=boxeo" class="categoria-link">
            <img src="media/img/boxeo.jpg" alt="Boxeo">
            <span>Boxeo</span>
          </a>
        </div>
        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=concierto" class="categoria-link">
            <img src="media/img/concierto.jpg" alt="Conciertos">
            <span>Conciertos</span>
          </a>
        </div>
        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=teatro" class="categoria-link">
            <img src="media/img/teatro.jpg" alt="Teatro">
            <span>Teatro</span>
          </a>
        </div>
        <div class="col-6 col-md-2">
          <a href="eventos.php?categoria=monster-truck" class="categoria-link">
            <img src="media/img/monstertruck.jpg" alt="Monster Truck">
            <span>Monster Truck</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>