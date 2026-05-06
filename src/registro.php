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

  <div class="contenedor-auth">
    <div class="tarjeta-auth">

      <!-- Logo -->
      <div class="text-center mb-4">
        <a href="index.php" class="text-decoration-none">
          <i class="bi bi-ticket-perforated-fill text-warning fs-1"></i>
          <h4 class="fw-bold mt-2 mb-0 text-dark">TodoTickets</h4>
        </a>
        <p class="text-muted mt-1">Crea tu cuenta gratis</p>
      </div>

      <form id="formulario-registro" novalidate>

        <div class="row g-3 mb-3">
          <div class="col-6">
            <label class="form-label fw-semibold">Nombre</label>
            <div class="input-group">
              <span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
              <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
            </div>
            <div class="error-campo" id="error-nombre"></div>
          </div>
          <div class="col-6">
            <label class="form-label fw-semibold">Apellidos</label>
            <div class="input-group">
              <span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
              <input type="text" class="form-control" id="apellidos" placeholder="Tus apellidos" required>
            </div>
            <div class="error-campo" id="error-apellidos"></div>
          </div>
        </div>

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
            <input type="password" class="form-control" id="contrasena" placeholder="Mínimo 8 caracteres" required>
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
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="bi bi-lock-fill text-muted"></i></span>
            <input type="password" class="form-control" id="contrasena2" placeholder="Repite tu contraseña" required>
          </div>
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

  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="media/js/auth.js"></script>
</body>
</html>