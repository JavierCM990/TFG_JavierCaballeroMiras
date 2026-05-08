<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi cuenta — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="media/css/estilos.css" rel="stylesheet">
  <link href="media/css/miCuenta.css" rel="stylesheet">
</head>
<body>

  <?php include 'comun/navbar.php'; ?>

  <main>
    <section class="cabecera-pagina">
      <div class="container">
        <h1 class="fw-bold mb-1">Mi cuenta</h1>
        <p class="text-muted mb-0">Bienvenido, Javier</p>
      </div>
    </section>

    <div class="container my-5">
      <div class="row g-4">

        <!-- MENÚ LATERAL -->
        <div class="col-lg-3">
          <div class="menu-cuenta">
            <a href="mi-cuenta.php" class="menu-cuenta-item activo">
              <i class="bi bi-ticket-perforated me-2"></i>Mis entradas
            </a>
            <a href="#" class="menu-cuenta-item">
              <i class="bi bi-person me-2"></i>Mis datos
            </a>
            <a href="index.php" class="menu-cuenta-item text-danger">
              <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
            </a>
          </div>
        </div>

        <!-- CONTENIDO -->
        <div class="col-lg-9">
          <div class="tarjeta-cuenta">
            <h5 class="fw-bold mb-4">Mis entradas</h5>

            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="tabla-cabecera">
                  <tr>
                    <th>Evento</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <img src="media/img/futbol.jpg" class="tabla-img" alt="Fútbol">
                        <div>
                          <p class="fw-semibold mb-0">Real Madrid vs FC Barcelona</p>
                          <small class="text-muted">Santiago Bernabéu, Madrid</small>
                        </div>
                      </div>
                    </td>
                    <td>15 Mayo 2026</td>
                    <td>General</td>
                    <td>2</td>
                    <td class="fw-semibold">52€</td>
                    <td><span class="estado-confirmado">Confirmada</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <img src="media/img/concierto.jpg" class="tabla-img" alt="Concierto">
                        <div>
                          <p class="fw-semibold mb-0">Bad Bunny — World Tour</p>
                          <small class="text-muted">WiZink Center, Madrid</small>
                        </div>
                      </div>
                    </td>
                    <td>22 Mayo 2026</td>
                    <td>VIP</td>
                    <td>1</td>
                    <td class="fw-semibold">120€</td>
                    <td><span class="estado-confirmado">Confirmada</span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <img src="media/img/teatro.jpg" class="tabla-img" alt="Teatro">
                        <div>
                          <p class="fw-semibold mb-0">El Rey León — Musical</p>
                          <small class="text-muted">Teatro Lope de Vega, Madrid</small>
                        </div>
                      </div>
                    </td>
                    <td>8 Junio 2026</td>
                    <td>Preferente</td>
                    <td>3</td>
                    <td class="fw-semibold">135€</td>
                    <td><span class="estado-pendiente">Pendiente</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </main>

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>