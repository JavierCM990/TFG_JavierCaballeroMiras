<?php $pagina_actual = basename($_SERVER['PHP_SELF']); ?>

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
        <li class="nav-item">
          <a class="nav-link <?php echo $pagina_actual == 'login.php' ? 'active' : ''; ?>" href="/TFG_JavierCaballeroMiras/src/login.php">Iniciar sesión</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-warning ms-2 px-4" href="/TFG_JavierCaballeroMiras/src/registro.php">Registrarse</a>
        </li>
      </ul>
    </div>
  </div>
</nav>