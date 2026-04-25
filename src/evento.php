<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="media/css/eventos.css" rel="stylesheet">
</head>

<body>

    <?php include 'comun/navbar.php'; ?>

    <!-- CABECERA -->
    <section class="cabecera-pagina">
        <div class="container">
            <h1 class="fw-bold mb-0">Real Madrid vs FC Barcelona</h1>
        </div>
    </section>

    <!-- CONTENIDO -->
    <div class="container my-5">
        <div class="row g-5">

            <!-- COLUMNA IZQUIERDA: imagen + info -->
            <div class="col-lg-7">

                <!-- Imagen con modal -->
                <div class="evento-img-wrap mb-4" data-bs-toggle="modal" data-bs-target="#modalImagen">
                    <img src="media/img/futbol.jpg" alt="Real Madrid vs FC Barcelona" class="evento-img">
                    <div class="evento-img-overlay">
                        <i class="bi bi-zoom-in"></i>
                    </div>
                </div>

                <!-- Info del evento -->
                <div class="evento-info-grid mb-4">
                    <div class="evento-info-item">
                        <i class="bi bi-calendar3 text-warning"></i>
                        <div>
                            <small class="text-muted">Fecha</small>
                            <p class="mb-0 fw-semibold">15 de Mayo de 2026</p>
                        </div>
                    </div>
                    <div class="evento-info-item">
                        <i class="bi bi-clock text-warning"></i>
                        <div>
                            <small class="text-muted">Hora</small>
                            <p class="mb-0 fw-semibold">21:00h</p>
                        </div>
                    </div>
                    <div class="evento-info-item">
                        <i class="bi bi-geo-alt text-warning"></i>
                        <div>
                            <small class="text-muted">Lugar</small>
                            <p class="mb-0 fw-semibold">Estadio Santiago Bernabéu, Madrid</p>
                        </div>
                    </div>
                    <div class="evento-info-item">
                        <i class="bi bi-tag text-warning"></i>
                        <div>
                            <small class="text-muted">Categoría</small>
                            <p class="mb-0 fw-semibold">Fútbol</p>
                        </div>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="evento-descripcion">
                    <h5 class="fw-bold mb-3">Sobre el evento</h5>
                    <p class="text-muted">El clásico del fútbol español enfrenta a los dos grandes del país en el mítico Santiago Bernabéu. Una cita ineludible para todos los amantes del fútbol, donde la emoción y el espectáculo están garantizados desde el primer al último minuto.</p>
                    <p class="text-muted">No te pierdas uno de los partidos más esperados de la temporada. Vive la magia del fútbol en directo.</p>
                </div>

            </div>

            <!-- COLUMNA DERECHA: panel de compra -->
            <div class="col-lg-5">
                <div class="panel-compra">

                    <h5 class="fw-bold mb-4"><i class="bi bi-ticket-perforated me-2 text-warning"></i>Selecciona tus entradas</h5>

                    <!-- Tipo de entrada -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tipo de entrada</label>
                        <div class="d-flex flex-column gap-3" id="tipos-entrada">

                            <label class="tipo-entrada-opcion" id="opcion-general">
                                <input type="radio" name="tipo-entrada" value="general" checked>
                                <div class="tipo-entrada-info">
                                    <span class="tipo-nombre">General</span>
                                    <span class="tipo-precio">25€ / entrada</span>
                                </div>
                                <i class="bi bi-check-circle-fill text-warning check-icon"></i>
                            </label>

                            <label class="tipo-entrada-opcion" id="opcion-preferente">
                                <input type="radio" name="tipo-entrada" value="preferente">
                                <div class="tipo-entrada-info">
                                    <span class="tipo-nombre">Preferente</span>
                                    <span class="tipo-precio">45€ / entrada</span>
                                </div>
                                <i class="bi bi-check-circle-fill text-warning check-icon"></i>
                            </label>

                            <label class="tipo-entrada-opcion" id="opcion-vip">
                                <input type="radio" name="tipo-entrada" value="vip">
                                <div class="tipo-entrada-info">
                                    <span class="tipo-nombre">VIP</span>
                                    <span class="tipo-precio">120€ / entrada</span>
                                </div>
                                <i class="bi bi-check-circle-fill text-warning check-icon"></i>
                            </label>

                        </div>
                    </div>

                    <!-- Cantidad -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Cantidad de entradas</label>
                        <div class="cantidad-selector">
                            <button class="btn-cantidad" id="btn-menos">−</button>
                            <span id="cantidad-valor">1</span>
                            <button class="btn-cantidad" id="btn-mas">+</button>
                        </div>
                        <small class="text-muted">Máximo 10 entradas por compra</small>
                    </div>

                    <!-- Resumen -->
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
                            <span id="resumen-precio-unit" class="fw-semibold">25€</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold fs-5">Total</span>
                            <span id="resumen-total" class="fw-bold fs-5 text-warning">25€</span>
                        </div>
                    </div>

                    <!-- Botón comprar -->
                    <a href="login.php" class="btn btn-warning w-100 fw-bold btn-lg">
                        <i class="bi bi-lock me-2"></i>Inicia sesión para comprar
                    </a>
                    <p class="text-center text-muted mt-2 small">¿No tienes cuenta? <a href="registro.php" class="text-warning">Regístrate gratis</a></p>

                    <!-- Entradas disponibles -->
                    <div class="text-center mt-3">
                        <small class="text-muted"><i class="bi bi-people me-1"></i>Quedan <strong>243</strong> entradas disponibles</small>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL IMAGEN -->
    <div class="modal fade" id="modalImagen" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-dark border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-2">
                    <img src="media/img/futbol.jpg" class="img-fluid w-100 rounded-3" alt="Evento">
                </div>
            </div>
        </div>
    </div>

    <?php include 'comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="media/js/evento.js"></script>
</body>

</html>