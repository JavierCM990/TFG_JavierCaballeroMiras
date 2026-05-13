<?php
include 'comun/db.php';

// Obtener el id de la URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Obtener el evento de la base de datos
$consulta = $conexion->prepare("SELECT * FROM eventos WHERE id = ?");
$consulta->bind_param("i", $id);
$consulta->execute();
$resultado = $consulta->get_result();
$evento = $resultado->fetch_assoc();

// Si no existe el evento redirigir a eventos
if (!$evento) {
    header('Location: eventos.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $evento['nombre']; ?> — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="media/css/estilos.css" rel="stylesheet">
    <link href="media/css/eventos.css" rel="stylesheet">
</head>

<body>

    <?php include 'comun/navbar.php'; ?>

    <main>
        <section class="cabecera-pagina">
            <div class="container">
                <h1 class="fw-bold mb-0"><?php echo $evento['nombre']; ?></h1>
            </div>
        </section>

        <div class="container my-5">
            <div class="row g-5">

                <!-- COLUMNA IZQUIERDA -->
                <div class="col-lg-7">

                    <div class="evento-img-wrap mb-4" data-bs-toggle="modal" data-bs-target="#modalImagen">
                        <img src="media/img/<?php echo $evento['imagen']; ?>" alt="<?php echo $evento['nombre']; ?>" class="evento-img">
                    </div>

                    <div class="evento-info-grid mb-4">
                        <div class="evento-info-item">
                            <div>
                                <small class="text-muted">Fecha</small>
                                <p class="mb-0 fw-semibold"><?php echo date('d \d\e F \d\e Y', strtotime($evento['fecha'])); ?></p>
                            </div>
                        </div>
                        <div class="evento-info-item">
                            <div>
                                <small class="text-muted">Hora</small>
                                <p class="mb-0 fw-semibold"><?php echo date('H:i', strtotime($evento['hora'])); ?>h</p>
                            </div>
                        </div>
                        <div class="evento-info-item">
                            <div>
                                <small class="text-muted">Lugar</small>
                                <p class="mb-0 fw-semibold"><?php echo $evento['lugar']; ?></p>
                            </div>
                        </div>
                        <div class="evento-info-item">
                            <div>
                                <small class="text-muted">Categoría</small>
                                <p class="mb-0 fw-semibold"><?php echo ucfirst($evento['categoria']); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="evento-descripcion">
                        <h5 class="fw-bold mb-3">Sobre el evento</h5>
                        <p class="text-muted"><?php echo $evento['descripcion']; ?></p>
                    </div>

                </div>

                <!-- COLUMNA DERECHA -->
                <div class="col-lg-5">
                    <div class="panel-compra">

                        <h5 class="fw-bold mb-4">Selecciona tus entradas</h5>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipo de entrada</label>
                            <div class="d-flex flex-column gap-3" id="tipos-entrada">

                                <label class="tipo-entrada-opcion">
                                    <input type="radio" name="tipo-entrada" value="general" data-precio="<?php echo $evento['precio_general']; ?>" checked>
                                    <div class="tipo-entrada-info">
                                        <span class="tipo-nombre">General</span>
                                        <span class="tipo-precio"><?php echo $evento['precio_general']; ?>€ / entrada</span>
                                    </div>
                                    <i class="bi bi-check-circle-fill text-warning check-icon"></i>
                                </label>

                                <?php if ($evento['precio_preferente']): ?>
                                    <label class="tipo-entrada-opcion">
                                        <input type="radio" name="tipo-entrada" value="preferente" data-precio="<?php echo $evento['precio_preferente']; ?>">
                                        <div class="tipo-entrada-info">
                                            <span class="tipo-nombre">Preferente</span>
                                            <span class="tipo-precio"><?php echo $evento['precio_preferente']; ?>€ / entrada</span>
                                        </div>
                                        <i class="bi bi-check-circle-fill text-warning check-icon"></i>
                                    </label>
                                <?php endif; ?>

                                <?php if ($evento['precio_vip']): ?>
                                    <label class="tipo-entrada-opcion">
                                        <input type="radio" name="tipo-entrada" value="vip" data-precio="<?php echo $evento['precio_vip']; ?>">
                                        <div class="tipo-entrada-info">
                                            <span class="tipo-nombre">VIP</span>
                                            <span class="tipo-precio"><?php echo $evento['precio_vip']; ?>€ / entrada</span>
                                        </div>
                                        <i class="bi bi-check-circle-fill text-warning check-icon"></i>
                                    </label>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Cantidad de entradas</label>
                            <div class="cantidad-selector">
                                <button class="btn-cantidad" id="btn-menos">−</button>
                                <span id="cantidad-valor">1</span>
                                <button class="btn-cantidad" id="btn-mas">+</button>
                            </div>
                            <small class="text-muted">Máximo 10 entradas por compra</small>
                        </div>

                        <div class="resumen-compra mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tipo</span>
                                <span id="resumen-tipo" class="fw-semibold">General</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Cantidad</span>
                                <span id="resumen-cantidad" class="fw-semibold">1 entrada</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Precio unitario</span>
                                <span id="resumen-precio-unit" class="fw-semibold"><?php echo $evento['precio_general']; ?>€</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="fw-bold fs-5">Total</span>
                                <span id="resumen-total" class="fw-bold fs-5 text-warning"><?php echo $evento['precio_general']; ?>€</span>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['usuario_id'])): ?>
                            <a href="compra.php?id=<?php echo $evento['id']; ?>&tipo=general&cantidad=1" id="btn-comprar" class="btn btn-warning w-100 fw-bold btn-lg">
                                Comprar entradas
                            </a>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-warning w-100 fw-bold btn-lg">
                                <i class="bi bi-lock me-2"></i>Inicia sesión para comprar
                            </a>
                            <p class="text-center text-muted mt-2 small">¿No tienes cuenta? <a href="registro.php" class="text-warning">Regístrate gratis</a></p>
                        <?php endif; ?>

                        <div class="text-center mt-3">
                            <small class="text-muted">Quedan <strong><?php echo $evento['entradas_disponibles']; ?></strong> entradas disponibles</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL IMAGEN -->
    <div class="modal fade" id="modalImagen" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-dark border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-2">
                    <img src="media/img/<?php echo $evento['imagen']; ?>"
                        class="img-fluid w-100 rounded-3" alt="<?php echo $evento['nombre']; ?>">
                </div>
            </div>
        </div>
    </div>

    <?php include 'comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="media/js/evento.js"></script>
</body>

</html>