<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

include '../comun/db.php';

$consulta = $conexion->query("SELECT * FROM eventos ORDER BY fecha ASC");
$eventos = $consulta->fetch_all(MYSQLI_ASSOC);
?>
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

      <div class="menu-admin mb-4">
        <a href="index.php" class="menu-admin-item activo">Eventos</a>
        <a href="ventas.php" class="menu-admin-item">Ventas</a>
        <a href="mensajes.php" class="menu-admin-item">Mensajes</a>
      </div>

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
              <?php foreach ($eventos as $evento): ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../media/img/<?php echo $evento['imagen']; ?>" class="tabla-img" alt="<?php echo $evento['nombre']; ?>">
                    <span class="fw-semibold"><?php echo $evento['nombre']; ?></span>
                  </div>
                </td>
                <td><?php echo ucfirst($evento['categoria']); ?></td>
                <td><?php echo date('d M Y', strtotime($evento['fecha'])); ?></td>
                <td><?php echo $evento['entradas_disponibles']; ?></td>
                <td>Desde <?php echo $evento['precio_general']; ?>€</td>
                <td>
                  <a href="editarEvento.php?id=<?php echo $evento['id']; ?>" class="btn btn-sm btn-outline-warning me-1">Editar</a>
                  <a href="eliminarEvento.php?id=<?php echo $evento['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Seguro que quieres eliminar este evento?')">Eliminar</a>
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