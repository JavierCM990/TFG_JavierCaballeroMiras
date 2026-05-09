<?php
include 'comun/db.php';

// Obtener todos los eventos
$consulta = $conexion->query("SELECT * FROM eventos ORDER BY fecha ASC");
$eventos = $consulta->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos — TodoTickets</title>
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
                <h1 class="fw-bold mb-1">Todos los eventos</h1>
                <p class="text-muted mb-0">Encuentra tu próximo evento favorito</p>
            </div>
        </section>

        <div class="container my-5">
            <div class="row g-4">

                <!-- FILTROS LATERAL -->
                <div class="col-lg-3">
                    <div class="filtros-panel">

                        <h5 class="fw-bold mb-3">Filtros</h5>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Buscar</label>
                            <input type="text" id="buscar-texto" class="form-control" placeholder="Nombre del evento...">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Categoría</label>
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check">
                                    <input class="form-check-input filtro-cat" type="checkbox" value="futbol" id="cat-futbol">
                                    <label class="form-check-label" for="cat-futbol">Fútbol</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filtro-cat" type="checkbox" value="baloncesto" id="cat-baloncesto">
                                    <label class="form-check-label" for="cat-baloncesto">Baloncesto</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filtro-cat" type="checkbox" value="boxeo" id="cat-boxeo">
                                    <label class="form-check-label" for="cat-boxeo">Boxeo</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filtro-cat" type="checkbox" value="concierto" id="cat-concierto">
                                    <label class="form-check-label" for="cat-concierto">Conciertos</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filtro-cat" type="checkbox" value="teatro" id="cat-teatro">
                                    <label class="form-check-label" for="cat-teatro">Teatro</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filtro-cat" type="checkbox" value="monster-truck" id="cat-monster">
                                    <label class="form-check-label" for="cat-monster">Monster Truck</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Fecha desde</label>
                            <input type="date" id="fecha-desde" class="form-control mb-2">
                            <label class="form-label fw-semibold">Fecha hasta</label>
                            <input type="date" id="fecha-hasta" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Precio máximo: <span id="precio-valor" class="text-warning fw-bold">150€</span></label>
                            <input type="range" class="form-range" min="0" max="300" value="150" id="precio-range">
                        </div>

                        <button id="btn-limpiar" class="btn btn-outline-secondary w-100">Limpiar filtros</button>

                    </div>
                </div>

                <!-- TARJETAS -->
                <div class="col-lg-9">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-muted">Mostrando <strong id="contador-eventos"><?php echo count($eventos); ?></strong> eventos</span>
                        <select id="ordenar" class="form-select w-auto">
                            <option value="fecha">Ordenar por: Fecha</option>
                            <option value="precio-asc">Precio (menor primero)</option>
                            <option value="precio-desc">Precio (mayor primero)</option>
                        </select>
                    </div>

                    <div class="row g-4" id="lista-eventos">

                        <?php foreach ($eventos as $evento): ?>
                            <div class="col-sm-6 col-xl-4 tarjeta-wrap"
                                data-categoria="<?php echo $evento['categoria']; ?>"
                                data-precio="<?php echo $evento['precio_general']; ?>"
                                data-fecha="<?php echo $evento['fecha']; ?>">
                                <a href="evento.php?id=<?php echo $evento['id']; ?>" class="tarjeta-evento">
                                    <div class="tarjeta-img-wrap">
                                        <img src="media/img/<?php echo $evento['imagen']; ?>" alt="<?php echo $evento['nombre']; ?>">
                                    </div>
                                    <div class="tarjeta-body">
                                        <h6 class="tarjeta-titulo"><?php echo $evento['nombre']; ?></h6>
                                        <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i><?php echo date('d M Y', strtotime($evento['fecha'])); ?></p>
                                        <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i><?php echo $evento['lugar']; ?></p>
                                        <div class="tarjeta-footer">
                                            <span class="tarjeta-precio">Desde <?php echo $evento['precio_general']; ?>€</span>
                                            <span class="btn btn-sm btn-warning">Comprar</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div id="sin-resultados" class="text-center py-5 d-none">
                        <p class="text-muted mt-3">No se encontraron eventos con esos filtros.</p>
                        <button id="btn-limpiar2" class="btn btn-warning">Limpiar filtros</button>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php include 'comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="media/js/eventos.js"></script>
</body>

</html>