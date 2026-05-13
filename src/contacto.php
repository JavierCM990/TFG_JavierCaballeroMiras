<?php
include 'comun/db.php';

$exito = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre  = trim($_POST['nombre']);
  $correo  = trim($_POST['correo']);
  $asunto  = trim($_POST['asunto']);
  $mensaje = trim($_POST['mensaje']);

  $insertar = $conexion->prepare("INSERT INTO mensajes (nombre, correo, asunto, mensaje) VALUES (?, ?, ?, ?)");
  $insertar->bind_param("ssss", $nombre, $correo, $asunto, $mensaje);

  if ($insertar->execute()) {
    $exito = true;
  } else {
    $error = 'Error al enviar el mensaje. Inténtalo de nuevo.';
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto — TodoTickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="media/css/estilos.css" rel="stylesheet">
  <link href="media/css/contacto.css" rel="stylesheet">
</head>

<body>

  <?php include 'comun/navbar.php'; ?>

  <main>
    <section class="cabecera-pagina">
      <div class="container">
        <h1 class="fw-bold mb-1">Contacto</h1>
        <p class="text-muted mb-0">¿Tienes alguna duda? Estamos aquí para ayudarte</p>
      </div>
    </section>

    <div class="container my-5">
      <div class="row g-5">

        <!-- FORMULARIO -->
        <div class="col-lg-7">
          <div class="tarjeta-contacto">
            <h5 class="fw-bold mb-4">Envíanos un mensaje</h5>

            <form id="formulario-contacto" method="POST" novalidate>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                  <div class="error-campo" id="error-nombre"></div>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Correo electrónico</label>
                  <input type="email" class="form-control" id="correo" name="correo" placeholder="tucorreo@email.com" required>
                  <div class="error-campo" id="error-correo"></div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Asunto</label>
                <select class="form-select" id="asunto" name="asunto">
                  <option value="">Selecciona un asunto</option>
                  <option value="compra">Problema con una compra</option>
                  <option value="evento">Información sobre un evento</option>
                  <option value="cuenta">Problema con mi cuenta</option>
                  <option value="reembolso">Solicitud de reembolso</option>
                  <option value="otro">Otro</option>
                </select>
                <div class="error-campo" id="error-asunto"></div>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                <div class="d-flex justify-content-between mt-1">
                  <div class="error-campo" id="error-mensaje"></div>
                  <small class="text-muted"><span id="contador-caracteres">0</span>/500</small>
                </div>
              </div>

              <button type="submit" class="btn btn-warning fw-bold btn-lg px-5">Enviar mensaje</button>

            </form>

            <?php if ($exito): ?>
              <div class="alerta-exito mt-4">
                ¡Mensaje enviado correctamente! Te responderemos en menos de 24 horas.
              </div>
            <?php endif; ?>

            <?php if ($error): ?>
              <div class="alert alert-danger mt-4"><?php echo $error; ?></div>
            <?php endif; ?>

          </div>
        </div>

        <!-- INFO CONTACTO -->
        <div class="col-lg-5">

          <div class="tarjeta-contacto mb-4">
            <h5 class="fw-bold mb-4">Información de contacto</h5>

            <div class="info-item">
              <div class="info-icono"><i class="bi bi-envelope-fill"></i></div>
              <div>
                <p class="fw-semibold mb-0">Correo electrónico</p>
                <p class="text-muted mb-0">soporte@todotickets.es</p>
              </div>
            </div>

            <div class="info-item">
              <div class="info-icono"><i class="bi bi-telephone-fill"></i></div>
              <div>
                <p class="fw-semibold mb-0">Teléfono</p>
                <p class="text-muted mb-0">+34 900 123 456</p>
              </div>
            </div>

            <div class="info-item">
              <div class="info-icono"><i class="bi bi-clock-fill"></i></div>
              <div>
                <p class="fw-semibold mb-0">Horario de atención</p>
                <p class="text-muted mb-0">Lunes a viernes: 9:00 — 18:00h</p>
              </div>
            </div>

            <div class="info-item">
              <div class="info-icono"><i class="bi bi-geo-alt-fill"></i></div>
              <div>
                <p class="fw-semibold mb-0">Dirección</p>
                <p class="text-muted mb-0">Calle Mayor 1, 28001 Madrid</p>
              </div>
            </div>

          </div>

          <div class="tarjeta-contacto">
            <h5 class="fw-bold mb-4">Síguenos</h5>
            <div class="d-flex gap-3">
              <a href="#" class="btn-red-social"><i class="bi bi-instagram"></i></a>
              <a href="#" class="btn-red-social"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="btn-red-social"><i class="bi bi-facebook"></i></a>
              <a href="#" class="btn-red-social"><i class="bi bi-youtube"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </main>
  <?php include 'comun/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="media/js/contacto.js"></script>
</body>

</html>