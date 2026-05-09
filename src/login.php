<?php
session_start();
include 'comun/db.php';

$error_servidor = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo     = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];
    $contrasena_hash = hash('sha256', $contrasena);

    $consulta = $conexion->prepare("SELECT id, nombre, rol FROM usuarios WHERE correo = ? AND contrasena = ?");
    $consulta->bind_param("ss", $correo, $contrasena_hash);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['usuario_id']     = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['usuario_rol']    = $usuario['rol'];

        if ($usuario['rol'] === 'admin') {
            header('Location: admin/index.php');
        } else {
            header('Location: index.php');
        }
        exit();
    } else {
        $error_servidor = 'Correo o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — TodoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="media/css/estilos.css" rel="stylesheet">
    <link href="media/css/auth.css" rel="stylesheet">
</head>

<body class="cuerpo-auth">

    <?php include 'comun/navbar.php'; ?>

    <main>
        <div class="contenedor-auth">
            <div class="tarjeta-auth">

                <div class="text-center mb-4">
                    <a href="index.php" class="text-decoration-none">
                        <i class="bi bi-ticket-perforated-fill text-warning fs-1"></i>
                        <h4 class="fw-bold mt-2 mb-0 text-dark">TodoTickets</h4>
                    </a>
                    <p class="text-muted mt-1">Inicia sesión en tu cuenta</p>
                </div>

                <?php if ($error_servidor): ?>
                    <div class="alert alert-danger"><?php echo $error_servidor; ?></div>
                <?php endif; ?>

                <form id="formulario-login" method="POST" novalidate>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="tucorreo@email.com" required>
                        <div class="error-campo" id="error-correo"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Tu contraseña" required>
                            <button class="btn btn-outline-secondary" type="button" id="mostrar-contrasena">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div class="error-campo" id="error-contrasena"></div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="recordarme">
                            <label class="form-check-label text-muted" for="recordarme">Recordarme</label>
                        </div>
                        <a href="#" class="text-warning text-decoration-none small">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold btn-lg mb-3">
                        Iniciar sesión
                    </button>

                    <p class="text-center text-muted mb-0">
                        ¿No tienes cuenta? <a href="registro.php" class="text-warning fw-semibold text-decoration-none">Regístrate gratis</a>
                    </p>

                </form>
            </div>
        </div>
    </main>

    <?php include 'comun/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="media/js/auth.js"></script>
</body>

</html>