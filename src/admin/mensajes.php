<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

include '../comun/db.php';

$consulta = $conexion->query("SELECT * FROM mensajes ORDER BY fecha DESC");
$mensajes = $consulta->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes — TodoTickets</title>
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
                <p class="text-muted mb-0">Mensajes de contacto</p>
            </div>
        </section>

        <div class="container my-5">

            <div class="menu-admin mb-4">
                <a href="index.php" class="menu-admin-item">Eventos</a>
                <a href="ventas.php" class="menu-admin-item">Ventas</a>
                <a href="mensajes.php" class="menu-admin-item activo">Mensajes</a>
            </div>

            <div class="tarjeta-admin">
                <?php if (count($mensajes) === 0): ?>
                    <p class="text-muted">No hay mensajes todavía.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="tabla-cabecera">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Asunto</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mensajes as $mensaje): ?>
                                    <tr>
                                        <td class="fw-semibold"><?php echo $mensaje['nombre']; ?></td>
                                        <td><?php echo $mensaje['correo']; ?></td>
                                        <td><?php echo ucfirst($mensaje['asunto']); ?></td>
                                        <td><?php echo mb_strimwidth($mensaje['mensaje'], 0, 60, '...'); ?></td>
                                        <td><?php echo date('d M Y H:i', strtotime($mensaje['fecha'])); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </main>

    <?php include '../comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>