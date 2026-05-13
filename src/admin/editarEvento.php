<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

include '../comun/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Obtener el evento
$consulta = $conexion->prepare("SELECT * FROM eventos WHERE id = ?");
$consulta->bind_param("i", $id);
$consulta->execute();
$resultado = $consulta->get_result();
$evento = $resultado->fetch_assoc();

if (!$evento) {
    header('Location: index.php');
    exit();
}

$error = '';
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre            = trim($_POST['nombre']);
    $categoria         = $_POST['categoria'];
    $fecha             = $_POST['fecha'];
    $hora              = $_POST['hora'];
    $lugar             = trim($_POST['lugar']);
    $descripcion       = trim($_POST['descripcion']);
    $precio_general    = (float)$_POST['precio-general'];
    $precio_preferente = (float)$_POST['precio-preferente'];
    $precio_vip        = (float)$_POST['precio-vip'];
    $entradas          = (int)$_POST['entradas'];
    $imagen            = trim($_POST['imagen']);

    $actualizar = $conexion->prepare("UPDATE eventos SET nombre=?, categoria=?, fecha=?, hora=?, lugar=?, descripcion=?, precio_general=?, precio_preferente=?, precio_vip=?, entradas_disponibles=?, imagen=? WHERE id=?");
    $actualizar->bind_param("ssssssdddisi", $nombre, $categoria, $fecha, $hora, $lugar, $descripcion, $precio_general, $precio_preferente, $precio_vip, $entradas, $imagen, $id);
    if ($actualizar->execute()) {
        $exito = true;
        // Actualizar los datos del evento para mostrarlos
        $evento['nombre']            = $nombre;
        $evento['categoria']         = $categoria;
        $evento['fecha']             = $fecha;
        $evento['hora']              = $hora;
        $evento['lugar']             = $lugar;
        $evento['descripcion']       = $descripcion;
        $evento['precio_general']    = $precio_general;
        $evento['precio_preferente'] = $precio_preferente;
        $evento['precio_vip']        = $precio_vip;
        $evento['entradas_disponibles'] = $entradas;
        $evento['imagen']            = $imagen;
    } else {
        $error = 'Error al actualizar el evento.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar evento — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../media/css/estilos.css" rel="stylesheet">
    <link href="../media/css/admin.css" rel="stylesheet">
</head>

<body>

    <?php include '../comun/navbar.php'; ?>

    <main>
        <section class="cabecera-pagina">
            <div class="container">
                <h1 class="fw-bold mb-1">Editar evento</h1>
                <p class="text-muted mb-0">Modifica los datos del evento</p>
            </div>
        </section>

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tarjeta-admin">

                        <?php if ($exito): ?>
                            <div class="alert alert-success">
                                Evento actualizado correctamente. <a href="index.php" class="text-success fw-bold">Ver eventos</a>
                            </div>
                        <?php endif; ?>

                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="POST" novalidate>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nombre del evento</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $evento['nombre']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Categoría</label>
                                <select class="form-select" name="categoria">
                                    <option value="futbol" <?php echo $evento['categoria'] == 'futbol' ? 'selected' : ''; ?>>Fútbol</option>
                                    <option value="baloncesto" <?php echo $evento['categoria'] == 'baloncesto' ? 'selected' : ''; ?>>Baloncesto</option>
                                    <option value="boxeo" <?php echo $evento['categoria'] == 'boxeo' ? 'selected' : ''; ?>>Boxeo</option>
                                    <option value="concierto" <?php echo $evento['categoria'] == 'concierto' ? 'selected' : ''; ?>>Concierto</option>
                                    <option value="teatro" <?php echo $evento['categoria'] == 'teatro' ? 'selected' : ''; ?>>Teatro</option>
                                    <option value="monster-truck" <?php echo $evento['categoria'] == 'monster-truck' ? 'selected' : ''; ?>>Monster Truck</option>
                                </select>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" value="<?php echo $evento['fecha']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Hora</label>
                                    <input type="time" class="form-control" name="hora" value="<?php echo $evento['hora']; ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Lugar</label>
                                <input type="text" class="form-control" name="lugar" value="<?php echo $evento['lugar']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Descripción</label>
                                <textarea class="form-control" name="descripcion" rows="4"><?php echo $evento['descripcion']; ?></textarea>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Precio General (€)</label>
                                    <input type="number" class="form-control" name="precio-general" value="<?php echo $evento['precio_general']; ?>" min="0">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Precio Preferente (€)</label>
                                    <input type="number" class="form-control" name="precio-preferente" value="<?php echo $evento['precio_preferente']; ?>" min="0">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Precio VIP (€)</label>
                                    <input type="number" class="form-control" name="precio-vip" value="<?php echo $evento['precio_vip']; ?>" min="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Entradas disponibles</label>
                                <input type="number" class="form-control" name="entradas" value="<?php echo $evento['entradas_disponibles']; ?>" min="1">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Nombre de la imagen</label>
                                <input type="text" class="form-control" name="imagen" value="<?php echo $evento['imagen']; ?>">
                                <small class="text-muted">La imagen debe estar en la carpeta media/img/</small>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-warning fw-bold px-5">Guardar cambios</button>
                                <a href="index.php" class="btn btn-outline-secondary px-5">Cancelar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include '../comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>