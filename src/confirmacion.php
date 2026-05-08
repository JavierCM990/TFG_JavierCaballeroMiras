<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="media/css/estilos.css" rel="stylesheet">
    <link href="media/css/compra.css" rel="stylesheet">
</head>

<body>

    <?php include 'comun/navbar.php'; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="tarjeta-compra text-center">
                    <h2 class="fw-bold mb-2">¡Compra realizada!</h2>
                    <p class="text-muted mb-4">Tu compra se ha completado correctamente. Te hemos enviado las entradas a tu correo electrónico.</p>

                    <hr>

                    <!-- Resumen -->
                    <div class="text-start mb-4">
                        <h6 class="fw-bold mb-3">Resumen de tu compra</h6>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Evento</span>
                            <span class="fw-semibold">Real Madrid vs FC Barcelona</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Fecha</span>
                            <span class="fw-semibold">15 Mayo 2026 — 21:00h</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Lugar</span>
                            <span class="fw-semibold">Santiago Bernabéu, Madrid</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tipo de entrada</span>
                            <span class="fw-semibold">General</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Cantidad</span>
                            <span class="fw-semibold">1 entrada</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Total pagado</span>
                            <span class="fw-bold text-warning">27€</span>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-grid gap-2">
                        <a href="mi-cuenta.php" class="btn btn-warning fw-bold">Ver mis entradas</a>
                        <a href="eventos.php" class="btn btn-outline-secondary">
                            Seguir comprando
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include 'comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>