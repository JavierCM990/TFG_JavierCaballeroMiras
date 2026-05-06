<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="media/css/eventos.css" rel="stylesheet">
</head>

<body>

    <!-- NAVBAR IMPORTADO -->
    <?php include 'comun/navbar.php'; ?>

    <!-- CABECERA -->
    <section class="cabecera-pagina">
        <div class="container">
            <h1 class="fw-bold mb-1">Todos los eventos</h1>
            <p class="text-muted mb-0">Encuentra tu próximo evento favorito</p>
        </div>
    </section>

    <!-- CONTENIDO -->
    <div class="container my-5">
        <div class="row g-4">

            <!-- FILTROS LATERAL -->
            <div class="col-lg-3">
                <div class="filtros-panel">

                    <h5 class="fw-bold mb-3"><i class="bi bi-funnel me-2"></i>Filtros</h5>

                    <!-- Búsqueda -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Buscar</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" id="buscar-texto" class="form-control" placeholder="Nombre del evento...">
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Categoría</label>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check">
                                <input class="form-check-input filtro-cat" type="checkbox" value="futbol" id="cat-futbol">
                                <label class="form-check-label" for="cat-futbol"><i class="bi bi-dribbble me-1 text-warning"></i>Fútbol</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filtro-cat" type="checkbox" value="baloncesto" id="cat-baloncesto">
                                <label class="form-check-label" for="cat-baloncesto"><i class="bi bi-dribbble me-1 text-warning"></i>Baloncesto</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filtro-cat" type="checkbox" value="boxeo" id="cat-boxeo">
                                <label class="form-check-label" for="cat-boxeo"><i class="bi bi-trophy me-1 text-warning"></i>Boxeo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filtro-cat" type="checkbox" value="concierto" id="cat-concierto">
                                <label class="form-check-label" for="cat-concierto"><i class="bi bi-music-note-beamed me-1 text-warning"></i>Conciertos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filtro-cat" type="checkbox" value="teatro" id="cat-teatro">
                                <label class="form-check-label" for="cat-teatro"><i class="bi bi-camera-reels me-1 text-warning"></i>Teatro</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input filtro-cat" type="checkbox" value="monster-truck" id="cat-monster">
                                <label class="form-check-label" for="cat-monster"><i class="bi bi-truck me-1 text-warning"></i>Monster Truck</label>
                            </div>
                        </div>
                    </div>

                    <!-- Fecha -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Fecha desde</label>
                        <input type="date" id="fecha-desde" class="form-control mb-2">
                        <label class="form-label fw-semibold">Fecha hasta</label>
                        <input type="date" id="fecha-hasta" class="form-control">
                    </div>

                    <!-- Precio -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Precio máximo: <span id="precio-valor" class="text-warning fw-bold">150€</span></label>
                        <input type="range" class="form-range" min="0" max="300" value="150" id="precio-range">
                    </div>

                    <!-- Botones -->
                    <button id="btn-limpiar" class="btn btn-outline-secondary w-100">Limpiar filtros</button>

                </div>
            </div>

            <!-- TARJETAS -->
            <div class="col-lg-9">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="text-muted">Mostrando <strong id="contador-eventos">6</strong> eventos</span>
                    <select id="ordenar" class="form-select w-auto">
                        <option value="fecha">Ordenar por: Fecha</option>
                        <option value="precio-asc">Precio (menor primero)</option>
                        <option value="precio-desc">Precio (mayor primero)</option>
                    </select>
                </div>

                <div class="row g-4" id="lista-eventos">

                    <div class="col-sm-6 col-xl-4 tarjeta-wrap" data-categoria="futbol" data-precio="45" data-fecha="2026-05-15">
                        <a href="evento.php?id=1" class="tarjeta-evento">
                            <div class="tarjeta-img-wrap">
                                <img src="media/img/futbol.jpg" alt="Fútbol">
                            </div>
                            <div class="tarjeta-body">
                                <h6 class="tarjeta-titulo">Real Madrid vs FC Barcelona</h6>
                                <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i>15 Mayo 2026</p>
                                <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i>Estadio Santiago Bernabéu, Madrid</p>
                                <div class="tarjeta-footer">
                                    <span class="tarjeta-precio">Desde 45€</span>
                                    <span class="btn btn-sm btn-warning">Comprar</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4 tarjeta-wrap" data-categoria="concierto" data-precio="65" data-fecha="2026-05-22">
                        <a href="evento.php?id=2" class="tarjeta-evento">
                            <div class="tarjeta-img-wrap">
                                <img src="media/img/concierto.jpg" alt="Concierto">
                            </div>
                            <div class="tarjeta-body">
                                <h6 class="tarjeta-titulo">Bad Bunny — World Tour</h6>
                                <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i>22 Mayo 2026</p>
                                <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i>WiZink Center, Madrid</p>
                                <div class="tarjeta-footer">
                                    <span class="tarjeta-precio">Desde 65€</span>
                                    <span class="btn btn-sm btn-warning">Comprar</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4 tarjeta-wrap" data-categoria="baloncesto" data-precio="30" data-fecha="2026-06-01">
                        <a href="evento.php?id=3" class="tarjeta-evento">
                            <div class="tarjeta-img-wrap">
                                <img src="media/img/baloncesto.jpg" alt="Baloncesto">
                            </div>
                            <div class="tarjeta-body">
                                <h6 class="tarjeta-titulo">Real Madrid vs Barça — ACB</h6>
                                <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i>1 Junio 2026</p>
                                <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i>Palacio de los Deportes, Madrid</p>
                                <div class="tarjeta-footer">
                                    <span class="tarjeta-precio">Desde 30€</span>
                                    <span class="btn btn-sm btn-warning">Comprar</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4 tarjeta-wrap" data-categoria="teatro" data-precio="35" data-fecha="2026-06-08">
                        <a href="evento.php?id=4" class="tarjeta-evento">
                            <div class="tarjeta-img-wrap">
                                <img src="media/img/teatro.jpg" alt="Teatro">
                            </div>
                            <div class="tarjeta-body">
                                <h6 class="tarjeta-titulo">El Rey León — Musical</h6>
                                <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i>8 Junio 2026</p>
                                <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i>Teatro Lope de Vega, Madrid</p>
                                <div class="tarjeta-footer">
                                    <span class="tarjeta-precio">Desde 35€</span>
                                    <span class="btn btn-sm btn-warning">Comprar</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4 tarjeta-wrap" data-categoria="boxeo" data-precio="50" data-fecha="2026-06-20">
                        <a href="evento.php?id=5" class="tarjeta-evento">
                            <div class="tarjeta-img-wrap">
                                <img src="media/img/boxeo.webp" alt="Boxeo">
                            </div>
                            <div class="tarjeta-body">
                                <h6 class="tarjeta-titulo">Velada del Año IV</h6>
                                <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i>20 Junio 2026</p>
                                <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i>Cívitas Metropolitano, Madrid</p>
                                <div class="tarjeta-footer">
                                    <span class="tarjeta-precio">Desde 50€</span>
                                    <span class="btn btn-sm btn-warning">Comprar</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-4 tarjeta-wrap" data-categoria="monster-truck" data-precio="25" data-fecha="2026-07-05">
                        <a href="evento.php?id=6" class="tarjeta-evento">
                            <div class="tarjeta-img-wrap">
                                <img src="media/img/monstertruck.jpg" alt="Monster Truck">
                            </div>
                            <div class="tarjeta-body">
                                <h6 class="tarjeta-titulo">Monster Jam — Spain Tour</h6>
                                <p class="tarjeta-info"><i class="bi bi-calendar3 me-1"></i>5 Julio 2026</p>
                                <p class="tarjeta-info"><i class="bi bi-geo-alt me-1"></i>RCDE Stadium, Barcelona</p>
                                <div class="tarjeta-footer">
                                    <span class="tarjeta-precio">Desde 25€</span>
                                    <span class="btn btn-sm btn-warning">Comprar</span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- Sin resultados -->
                <div id="sin-resultados" class="text-center py-5 d-none">
                    <i class="bi bi-search fs-1 text-muted"></i>
                    <p class="text-muted mt-3">No se encontraron eventos con esos filtros.</p>
                    <button id="btn-limpiar2" class="btn btn-warning">Limpiar filtros</button>
                </div>

            </div>
        </div>
    </div>

    <!-- FOOTER IMPORTADO -->
    <?php include 'comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="media/js/eventos.js"></script>
</body>

</html>