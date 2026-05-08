<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Admin — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="../media/css/estilos.css" rel="stylesheet">
  <link href="../media/css/admin.css" rel="stylesheet">
</head>
<body>

  <?php include '../comun/navbar.php'; ?>

  <main>
    <section class="cabecera-pagina">
      <div class="container d-flex justify-content-between align-items-center">
        <div>
          <h1 class="fw-bold mb-1">Panel de administración</h1>
          <p class="text-muted mb-0">Gestión de eventos</p>
        </div>
        <a href="crearEvento.php" class="btn btn-warning fw-bold">
          <i class="bi bi-plus-lg me-2"></i>Nuevo evento
        </a>
      </div>
    </section>

    <div class="container my-5">

      <!-- MENÚ ADMIN -->
      <div class="menu-admin mb-4">
        <a href="index.php" class="menu-admin-item activo">Eventos</a>
        <a href="ventas.php" class="menu-admin-item">Ventas</a>
      </div>

      <!-- TABLA EVENTOS -->
      <div class="tarjeta-admin">
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="tabla-cabecera">
              <tr>
                <th>Evento</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Entradas</th>
                <th>Precio</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/futbol.jpg" class="tabla-img" alt="Fútbol">
                    <span class="fw-semibold">Real Madrid vs FC Barcelona</span>
                  </div>
                </td>
                <td>Fútbol</td>
                <td>15 Mayo 2026</td>
                <td>243</td>
                <td>Desde 25€</td>
                <td>
                  <a href="editar-evento.php?id=1" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/concierto.jpg" class="tabla-img" alt="Concierto">
                    <span class="fw-semibold">Bad Bunny — World Tour</span>
                  </div>
                </td>
                <td>Concierto</td>
                <td>22 Mayo 2026</td>
                <td>180</td>
                <td>Desde 65€</td>
                <td>
                  <a href="editar-evento.php?id=2" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/baloncesto.jpg" class="tabla-img" alt="Baloncesto">
                    <span class="fw-semibold">Real Madrid vs Barça — ACB</span>
                  </div>
                </td>
                <td>Baloncesto</td>
                <td>1 Junio 2026</td>
                <td>320</td>
                <td>Desde 30€</td>
                <td>
                  <a href="editar-evento.php?id=3" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/teatro.jpg" class="tabla-img" alt="Teatro">
                    <span class="fw-semibold">El Rey León — Musical</span>
                  </div>
                </td>
                <td>Teatro</td>
                <td>8 Junio 2026</td>
                <td>150</td>
                <td>Desde 35€</td>
                <td>
                  <a href="editar-evento.php?id=4" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/boxeo.webp" class="tabla-img" alt="Boxeo">
                    <span class="fw-semibold">Velada del Año IV</span>
                  </div>
                </td>
                <td>Boxeo</td>
                <td>20 Junio 2026</td>
                <td>500</td>
                <td>Desde 50€</td>
                <td>
                  <a href="editar-evento.php?id=5" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/monstertruck.jpg" class="tabla-img" alt="Monster Truck">
                    <span class="fw-semibold">Monster Jam — Spain Tour</span>
                  </div>
                </td>
                <td>Monster Truck</td>
                <td>5 Julio 2026</td>
                <td>400</td>
                <td>Desde 25€</td>
                <td>
                  <a href="editar-evento.php?id=6" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </main>

  <?php include '../comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>