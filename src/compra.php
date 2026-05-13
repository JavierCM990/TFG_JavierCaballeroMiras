<?php
session_start();

// Si no está logueado redirigir al login
if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit();
}

include 'comun/db.php';

$id_evento = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$tipo      = isset($_GET['tipo']) ? $_GET['tipo'] : 'general';
$cantidad  = isset($_GET['cantidad']) ? (int)$_GET['cantidad'] : 1;

// Obtener el evento
$consulta = $conexion->prepare("SELECT * FROM eventos WHERE id = ?");
$consulta->bind_param("i", $id_evento);
$consulta->execute();
$resultado = $consulta->get_result();
$evento = $resultado->fetch_assoc();

if (!$evento) {
  header('Location: eventos.php');
  exit();
}

// Calcular precio según tipo
$precio_unitario = $evento['precio_general'];
if ($tipo === 'preferente' && $evento['precio_preferente']) $precio_unitario = $evento['precio_preferente'];
if ($tipo === 'vip' && $evento['precio_vip']) $precio_unitario = $evento['precio_vip'];

$gastos_gestion = 2;
$total = ($precio_unitario * $cantidad) + $gastos_gestion;
?>
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

  <main>
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

            <form id="formulario-pago" method="POST" action="procesarCompra.php" novalidate>
              <input type="hidden" name="id_evento" value="<?php echo $evento['id']; ?>">
              <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
              <input type="hidden" name="cantidad" value="<?php echo $cantidad; ?>">
              <input type="hidden" name="total" value="<?php echo $total; ?>">

              <div class="mb-3">
                <label class="form-label fw-semibold">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre completo">
                <div class="error-campo" id="error-nombre"></div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="tucorreo@email.com">
                <div class="error-campo" id="error-correo"></div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Número de tarjeta</label>
                <input type="text" class="form-control" id="numero-tarjeta" name="numero-tarjeta" placeholder="0000000000000000" maxlength="16">
                <div class="error-campo" id="error-numero-tarjeta"></div>
              </div>

              <div class="row g-3 mb-4">
                <div class="col-6">
                  <label class="form-label fw-semibold">Caducidad</label>
                  <input type="text" class="form-control" id="caducidad" name="caducidad" placeholder="MM/AA" maxlength="5">
                  <div class="error-campo" id="error-caducidad"></div>
                </div>
                <div class="col-6">
                  <label class="form-label fw-semibold">CVV</label>
                  <input type="text" class="form-control" id="cvv" name="cvv" placeholder="000" maxlength="3">
                  <div class="error-campo" id="error-cvv"></div>
                </div>
              </div>

              <button type="submit" class="btn btn-warning w-100 fw-bold btn-lg">
                Confirmar pago — <?php echo $total; ?>€
              </button>

            </form>
          </div>
        </div>

        <!-- RESUMEN -->
        <div class="col-lg-5">
          <div class="tarjeta-compra">
            <h5 class="fw-bold mb-4">Resumen del pedido</h5>

            <img src="media/img/<?php echo $evento['imagen']; ?>" alt="<?php echo $evento['nombre']; ?>" class="w-100 rounded-3 mb-3" style="height:140px; object-fit:cover;">

            <p class="fw-bold mb-1"><?php echo $evento['nombre']; ?></p>
            <p class="text-muted small mb-1"><i class="bi bi-calendar3 me-1"></i><?php echo date('d M Y', strtotime($evento['fecha'])); ?> — <?php echo date('H:i', strtotime($evento['hora'])); ?>h</p>
            <p class="text-muted small mb-3"><i class="bi bi-geo-alt me-1"></i><?php echo $evento['lugar']; ?></p>

            <hr>

            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Tipo</span>
              <span><?php echo ucfirst($tipo); ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Cantidad</span>
              <span><?php echo $cantidad; ?> entrada<?php echo $cantidad > 1 ? 's' : ''; ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Precio unitario</span>
              <span><?php echo $precio_unitario; ?>€</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Gastos de gestión</span>
              <span><?php echo $gastos_gestion; ?>€</span>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
              <span class="fw-bold fs-5">Total</span>
              <span class="fw-bold fs-5 text-warning"><?php echo $total; ?>€</span>
            </div>

          </div>
        </div>

      </div>
    </div>
  </main>

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="media/js/compra.js?v=2"></script>
</body>

</html>