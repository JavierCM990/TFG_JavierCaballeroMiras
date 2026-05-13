<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold fs-4" href="/TFG_JavierCaballeroMiras/src/index.php">
      <i class="bi bi-ticket-perforated-fill text-warning me-2"></i>TodoTickets
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?php echo $pagina_actual == 'index.php' ? 'active' : ''; ?>" href="/TFG_JavierCaballeroMiras/src/index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $pagina_actual == 'eventos.php' ? 'active' : ''; ?>" href="/TFG_JavierCaballeroMiras/src/eventos.php">Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $pagina_actual == 'contacto.php' ? 'active' : ''; ?>" href="/TFG_JavierCaballeroMiras/src/contacto.php">Contacto</a>
        </li>
      </ul>
      <ul class="navbar-nav align-items-center">
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/TFG_JavierCaballeroMiras/src/miCuenta.php">
              <i class="bi bi-person-circle me-1"></i><?php echo $_SESSION['usuario_nombre']; ?>
            </a>
          </li>
          <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="/TFG_JavierCaballeroMiras/src/admin/index.php">Panel admin</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="btn btn-outline-warning ms-2 px-4" href="/TFG_JavierCaballeroMiras/src/logout.php">Cerrar sesión</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?php echo $pagina_actual == 'login.php' ? 'active' : ''; ?>" href="/TFG_JavierCaballeroMiras/src/login.php">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-warning ms-2 px-4" href="/TFG_JavierCaballeroMiras/src/registro.php">Registrarse</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>