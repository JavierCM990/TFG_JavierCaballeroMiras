<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compra — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="media/css/estilos.css" rel="stylesheet">
  <link href="media/css/compra.css" rel="stylesheet">
</head>
<body>

  <?php include 'comun/navbar.php'; ?>

  <section class="cabecera-pagina">
    <div class="container">
      <h1 class="fw-bold mb-1">Finalizar compra</h1>
    </div>
  </section>

  <div class="container my-5">
    <div class="row g-4">

      <!-- FORMULARIO -->
      <div class="col-lg-7">
        <div class="tarjeta-compra">
          <h5 class="fw-bold mb-4">Datos del pago</h5>

          <form id="formulario-pago" novalidate>

            <div class="mb-3">
              <label class="form-label fw-semibold">Nombre completo</label>
              <input type="text" class="form-control" id="nombre" placeholder="Tu nombre completo">
              <div class="error-campo" id="error-nombre"></div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" placeholder="tucorreo@email.com">
              <div class="error-campo" id="error-correo"></div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Número de tarjeta</label>
              <input type="text" class="form-control" id="numero-tarjeta" placeholder="0000000000000000" maxlength="16">
              <div class="error-campo" id="error-numero-tarjeta"></div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-6">
                <label class="form-label fw-semibold">Caducidad</label>
                <input type="text" class="form-control" id="caducidad" placeholder="MM/AA" maxlength="5">
                <div class="error-campo" id="error-caducidad"></div>
              </div>
              <div class="col-6">
                <label class="form-label fw-semibold">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="000" maxlength="3">
                <div class="error-campo" id="error-cvv"></div>
              </div>
            </div>

            <button type="submit" class="btn btn-warning w-100 fw-bold btn-lg">
              Confirmar pago — 27€
            </button>

          </form>
        </div>
      </div>

      <!-- RESUMEN -->
      <div class="col-lg-5">
        <div class="tarjeta-compra">
          <h5 class="fw-bold mb-4">Resumen del pedido</h5>

          <img src="media/img/futbol.jpg" alt="Evento" class="w-100 rounded-3 mb-3" style="height:140px; object-fit:cover;">

          <p class="fw-bold mb-1">Real Madrid vs FC Barcelona</p>
          <p class="text-muted small mb-1"><i class="bi bi-calendar3 me-1"></i>15 Mayo 2026 — 21:00h</p>
          <p class="text-muted small mb-3"><i class="bi bi-geo-alt me-1"></i>Santiago Bernabéu, Madrid</p>

          <hr>

          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Tipo</span>
            <span>General</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Cantidad</span>
            <span>1 entrada</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Precio</span>
            <span>25€</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Gastos de gestión</span>
            <span>2€</span>
          </div>

          <hr>

          <div class="d-flex justify-content-between">
            <span class="fw-bold fs-5">Total</span>
            <span class="fw-bold fs-5 text-warning">27€</span>
          </div>

        </div>
      </div>

    </div>
  </div>

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="media/js/compra.js"></script>
</body>
</html>