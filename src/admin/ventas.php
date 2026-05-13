<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

include '../comun/db.php';

$consulta = $conexion->query("
    SELECT compras.*, usuarios.nombre AS nombre_usuario, usuarios.apellidos,
           eventos.nombre AS nombre_evento
    FROM compras
    JOIN usuarios ON compras.usuario_id = usuarios.id
    JOIN eventos ON compras.evento_id = eventos.id
    ORDER BY compras.fecha_compra DESC
");
$ventas = $consulta->fetch_all(MYSQLI_ASSOC);
?>
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

      <div class="menu-admin mb-4">
        <a href="index.php" class="menu-admin-item">Eventos</a>
        <a href="ventas.php" class="menu-admin-item activo">Ventas</a>
        <a href="mensajes.php" class="menu-admin-item">Mensajes</a>
      </div>

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
              <?php foreach ($ventas as $venta): ?>
              <tr>
                <td>#<?php echo str_pad($venta['id'], 5, '0', STR_PAD_LEFT); ?></td>
                <td><?php echo $venta['nombre_usuario'] . ' ' . $venta['apellidos']; ?></td>
                <td><?php echo $venta['nombre_evento']; ?></td>
                <td><?php echo ucfirst($venta['tipo_entrada']); ?></td>
                <td><?php echo $venta['cantidad']; ?></td>
                <td class="fw-semibold"><?php echo $venta['precio_total']; ?>€</td>
                <td><?php echo date('d M Y', strtotime($venta['fecha_compra'])); ?></td>
                <td>
                  <?php if ($venta['estado'] === 'confirmada'): ?>
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
      </div>

    </div>
  </main>

  <?php include '../comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>