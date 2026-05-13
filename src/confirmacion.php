<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

include 'comun/db.php';

$id_compra = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$consulta = $conexion->prepare("
    SELECT compras.*, eventos.nombre AS nombre_evento, eventos.fecha, eventos.hora, eventos.lugar
    FROM compras
    JOIN eventos ON compras.evento_id = eventos.id
    WHERE compras.id = ? AND compras.usuario_id = ?
");
$consulta->bind_param("ii", $id_compra, $_SESSION['usuario_id']);
$consulta->execute();
$resultado = $consulta->get_result();
$compra = $resultado->fetch_assoc();

if (!$compra) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="media/css/estilos.css" rel="stylesheet">
    <link href="media/css/compra.css" rel="stylesheet">
</head>

<body>

    <?php include 'comun/navbar.php'; ?>

    <main>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="tarjeta-compra text-center">

                        <h2 class="fw-bold mb-2">¡Compra realizada!</h2>
                        <p class="text-muted mb-4">Tu compra se ha completado correctamente. Te hemos enviado las entradas a tu correo electrónico.</p>

                        <hr>

                        <div class="text-start mb-4">
                            <h6 class="fw-bold mb-3">Resumen de tu compra</h6>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Evento</span>
                                <span class="fw-semibold"><?php echo $compra['nombre_evento']; ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Fecha</span>
                                <span class="fw-semibold"><?php echo date('d M Y', strtotime($compra['fecha'])); ?> — <?php echo date('H:i', strtotime($compra['hora'])); ?>h</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Lugar</span>
                                <span class="fw-semibold"><?php echo $compra['lugar']; ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tipo de entrada</span>
                                <span class="fw-semibold"><?php echo ucfirst($compra['tipo_entrada']); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Cantidad</span>
                                <span class="fw-semibold"><?php echo $compra['cantidad']; ?> entrada<?php echo $compra['cantidad'] > 1 ? 's' : ''; ?></span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <span class="fw-bold">Total pagado</span>
                                <span class="fw-bold text-warning"><?php echo $compra['precio_total']; ?>€</span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="miCuenta.php" class="btn btn-warning fw-bold">Ver mis entradas</a>
                            <a href="eventos.php" class="btn btn-outline-secondary">Seguir comprando</a>
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