<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="../media/css/estilos.css" rel="stylesheet">
  <link href="../media/css/admin.css" rel="stylesheet">
</head>
<body>

  <?php include '../comun/navbar.php'; ?>

  <main>
    <section class="cabecera-pagina">
      <div class="container">
        <h1 class="fw-bold mb-1">Panel de administración</h1>
        <p class="text-muted mb-0">Ventas realizadas</p>
      </div>
    </section>

    <div class="container my-5">

      <!-- MENÚ ADMIN -->
      <div class="menu-admin mb-4">
        <a href="index.php" class="menu-admin-item">Eventos</a>
        <a href="ventas.php" class="menu-admin-item activo">Ventas</a>
      </div>

      <!-- TABLA VENTAS -->
      <div class="tarjeta-admin">
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="tabla-cabecera">
              <tr>
                <th>Nº Pedido</th>
                <th>Usuario</th>
                <th>Evento</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha compra</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#00001</td>
                <td>Javier Caballero</td>
                <td>Real Madrid vs FC Barcelona</td>
                <td>General</td>
                <td>2</td>
                <td class="fw-semibold">52€</td>
                <td>10 Abril 2026</td>
                <td><span class="estado-confirmado">Confirmada</span></td>
              </tr>
              <tr>
                <td>#00002</td>
                <td>María García</td>
                <td>Bad Bunny — World Tour</td>
                <td>VIP</td>
                <td>1</td>
                <td class="fw-semibold">120€</td>
                <td>11 Abril 2026</td>
                <td><span class="estado-confirmado">Confirmada</span></td>
              </tr>
              <tr>
                <td>#00003</td>
                <td>Carlos López</td>
                <td>El Rey León — Musical</td>
                <td>Preferente</td>
                <td>3</td>
                <td class="fw-semibold">135€</td>
                <td>12 Abril 2026</td>
                <td><span class="estado-pendiente">Pendiente</span></td>
              </tr>
              <tr>
                <td>#00004</td>
                <td>Ana Martínez</td>
                <td>Velada del Año IV</td>
                <td>General</td>
                <td>2</td>
                <td class="fw-semibold">100€</td>
                <td>13 Abril 2026</td>
                <td><span class="estado-confirmado">Confirmada</span></td>
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