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

  <div class="contenedor-auth">
    <div class="tarjeta-auth">

      <!-- Logo -->
      <div class="text-center mb-4">
        <a href="index.php" class="text-decoration-none">
          <i class="bi bi-ticket-perforated-fill text-warning fs-1"></i>
          <h4 class="fw-bold mt-2 mb-0 text-dark">TodoTickets</h4>
        </a>
        <p class="text-muted mt-1">Inicia sesión en tu cuenta</p>
      </div>

      <form id="formulario-login" novalidate>

        <div class="mb-3">
          <label class="form-label fw-semibold">Correo electrónico</label>
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="bi bi-envelope text-muted"></i></span>
            <input type="email" class="form-control" id="correo" placeholder="tucorreo@email.com" required>
          </div>
          <div class="error-campo" id="error-correo"></div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Contraseña</label>
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="bi bi-lock text-muted"></i></span>
            <input type="password" class="form-control" id="contrasena" placeholder="Tu contraseña" required>
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

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="media/js/auth.js"></script>
</body>
</html>