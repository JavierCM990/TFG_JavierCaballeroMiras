<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo evento — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../media/css/estilos.css" rel="stylesheet">
  <link href="../media/css/admin.css" rel="stylesheet">
</head>
<body>

  <?php include '../comun/navbar.php'; ?>

  <main>
    <section class="cabecera-pagina">
      <div class="container">
        <h1 class="fw-bold mb-1">Nuevo evento</h1>
        <p class="text-muted mb-0">Rellena los datos del nuevo evento</p>
      </div>
    </section>

    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="tarjeta-admin">

            <form id="formulario-evento" novalidate>

              <div class="mb-3">
                <label class="form-label fw-semibold">Nombre del evento</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ej: Real Madrid vs FC Barcelona">
                <div class="error-campo" id="error-nombre"></div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Categoría</label>
                <select class="form-select" id="categoria">
                  <option value="">Selecciona una categoría</option>
                  <option value="futbol">Fútbol</option>
                  <option value="baloncesto">Baloncesto</option>
                  <option value="boxeo">Boxeo</option>
                  <option value="concierto">Concierto</option>
                  <option value="teatro">Teatro</option>
                  <option value="monster-truck">Monster Truck</option>
                </select>
                <div class="error-campo" id="error-categoria"></div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Fecha</label>
                  <input type="date" class="form-control" id="fecha">
                  <div class="error-campo" id="error-fecha"></div>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Hora</label>
                  <input type="time" class="form-control" id="hora">
                  <div class="error-campo" id="error-hora"></div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Lugar</label>
                <input type="text" class="form-control" id="lugar" placeholder="Ej: Santiago Bernabéu, Madrid">
                <div class="error-campo" id="error-lugar"></div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="4" placeholder="Describe el evento..."></textarea>
                <div class="error-campo" id="error-descripcion"></div>
              </div>

              <div class="row g-3 mb-4">
                <div class="col-md-4">
                  <label class="form-label fw-semibold">Precio General (€)</label>
                  <input type="number" class="form-control" id="precio-general" placeholder="25" min="0">
                  <div class="error-campo" id="error-precio-general"></div>
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-semibold">Precio Preferente (€)</label>
                  <input type="number" class="form-control" id="precio-preferente" placeholder="45" min="0">
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-semibold">Precio VIP (€)</label>
                  <input type="number" class="form-control" id="precio-vip" placeholder="120" min="0">
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold">Entradas disponibles</label>
                <input type="number" class="form-control" id="entradas" placeholder="500" min="1">
                <div class="error-campo" id="error-entradas"></div>
              </div>

              <div class="d-flex gap-3">
                <button type="submit" class="btn btn-warning fw-bold px-5">Guardar evento</button>
                <a href="index.php" class="btn btn-outline-secondary px-5">Cancelar</a>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include '../comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../media/js/admin.js"></script>
</body>
</html>