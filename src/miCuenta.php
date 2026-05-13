<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

include 'comun/db.php';

$id_usuario = $_SESSION['usuario_id'];

$consulta = $conexion->prepare("
    SELECT compras.*, eventos.nombre AS nombre_evento, eventos.fecha, eventos.lugar, eventos.imagen
    FROM compras
    JOIN eventos ON compras.evento_id = eventos.id
    WHERE compras.usuario_id = ?
    ORDER BY compras.fecha_compra DESC
");
$consulta->bind_param("i", $id_usuario);
$consulta->execute();
$resultado = $consulta->get_result();
$compras = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi cuenta — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="media/css/estilos.css" rel="stylesheet">
  <link href="media/css/micuenta.css" rel="stylesheet">
</head>
<body>

  <?php include 'comun/navbar.php'; ?>

  <main>
    <section class="cabecera-pagina">
      <div class="container">
        <h1 class="fw-bold mb-1">Mi cuenta</h1>
        <p class="text-muted mb-0">Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?></p>
      </div>
    </section>

    <div class="container my-5">
      <div class="row g-4">

        <!-- MENÚ LATERAL -->
        <div class="col-lg-3">
          <div class="menu-cuenta">
            <a href="miCuenta.php" class="menu-cuenta-item activo">
              <i class="bi bi-ticket-perforated me-2"></i>Mis entradas
            </a>
            <a href="#" class="menu-cuenta-item">
              <i class="bi bi-person me-2"></i>Mis datos
            </a>
            <a href="logout.php" class="menu-cuenta-item text-danger">
              <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
            </a>
          </div>
        </div>

        <!-- CONTENIDO -->
        <div class="col-lg-9">
          <div class="tarjeta-cuenta">
            <h5 class="fw-bold mb-4">Mis entradas</h5>

            <?php if (count($compras) === 0): ?>
              <p class="text-muted">No tienes entradas compradas todavía. <a href="eventos.php" class="text-warning">Ver eventos</a></p>
            <?php else: ?>
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
                    <?php foreach ($compras as $compra): ?>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center gap-3">
                          <img src="media/img/<?php echo $compra['imagen']; ?>" class="tabla-img" alt="<?php echo $compra['nombre_evento']; ?>">
                          <div>
                            <p class="fw-semibold mb-0"><?php echo $compra['nombre_evento']; ?></p>
                            <small class="text-muted"><?php echo $compra['lugar']; ?></small>
                          </div>
                        </div>
                      </td>
                      <td><?php echo date('d M Y', strtotime($compra['fecha'])); ?></td>
                      <td><?php echo ucfirst($compra['tipo_entrada']); ?></td>
                      <td><?php echo $compra['cantidad']; ?></td>
                      <td class="fw-semibold"><?php echo $compra['precio_total']; ?>€</td>
                      <td>
                        <?php if ($compra['estado'] === 'confirmada'): ?>
                          <span class="estado-confirmado">Confirmada</span>
                        <?php else: ?>
                          <span class="estado-pendiente">Pendiente</span>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
  </main>

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>