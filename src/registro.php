<?php
include 'comun/db.php';

$error_servidor = '';
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = trim($_POST['nombre']);
    $apellidos  = trim($_POST['apellidos']);
    $correo     = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Comprobar si el correo ya existe
    $consulta = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $consulta->bind_param("s", $correo);
    $consulta->execute();
    $consulta->store_result();

    if ($consulta->num_rows > 0) {
        $error_servidor = 'Este correo ya está registrado.';
    } else {
        $contrasena_hash = hash('sha256', $contrasena);
        $insertar = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, contrasena) VALUES (?, ?, ?, ?)");
        $insertar->bind_param("ssss", $nombre, $apellidos, $correo, $contrasena_hash);
        if ($insertar->execute()) {
            $exito = true;
        } else {
            $error_servidor = 'Error al registrar. Inténtalo de nuevo.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro — TodoTickets</title>
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
          <p class="text-muted mt-1">Crea tu cuenta gratis</p>
        </div>

        <?php if ($exito): ?>
          <div class="alert alert-success">
            ¡Cuenta creada correctamente! <a href="login.php" class="text-success fw-bold">Inicia sesión</a>
          </div>
        <?php endif; ?>

        <?php if ($error_servidor): ?>
          <div class="alert alert-danger"><?php echo $error_servidor; ?></div>
        <?php endif; ?>

        <form id="formulario-registro" method="POST" novalidate>

          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label fw-semibold">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
              <div class="error-campo" id="error-nombre"></div>
            </div>
            <div class="col-6">
              <label class="form-label fw-semibold">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Tus apellidos" required>
              <div class="error-campo" id="error-apellidos"></div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="tucorreo@email.com" required>
            <div class="error-campo" id="error-correo"></div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Contraseña</label>
            <div class="input-group">
              <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Mínimo 8 caracteres" required>
              <button class="btn btn-outline-secondary" type="button" id="mostrar-contrasena">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="error-campo" id="error-contrasena"></div>
            <div class="mt-2">
              <div class="progress" style="height:4px;">
                <div class="progress-bar" id="barra-fortaleza" style="width:0%"></div>
              </div>
              <small id="texto-fortaleza" class="text-muted"></small>
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold">Repetir contraseña</label>
            <input type="password" class="form-control" id="contrasena2" placeholder="Repite tu contraseña" required>
            <div class="error-campo" id="error-contrasena2"></div>
          </div>

          <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="terminos">
            <label class="form-check-label text-muted" for="terminos">
              Acepto los <a href="#" class="text-warning">términos y condiciones</a>
            </label>
            <div class="error-campo" id="error-terminos"></div>
          </div>

          <button type="submit" class="btn btn-warning w-100 fw-bold btn-lg mb-3">
            Crear cuenta
          </button>

          <p class="text-center text-muted mb-0">
            ¿Ya tienes cuenta? <a href="login.php" class="text-warning fw-semibold text-decoration-none">Inicia sesión</a>
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