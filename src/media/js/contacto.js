function validarCorreo(correo) {
  return /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/.test(correo);
}

// Contador de caracteres del mensaje
const mensaje = document.getElementById('mensaje');
const contador = document.getElementById('contador-caracteres');

mensaje.addEventListener('input', function () {
  const longitud = this.value.length;
  contador.textContent = longitud;
  if (longitud > 500) {
    this.value = this.value.substring(0, 500);
    contador.textContent = 500;
  }
});

// Validación y envío
const formulario = document.getElementById('formulario-contacto');
const mensajeExito = document.getElementById('mensaje-exito');

formulario.addEventListener('submit', function (e) {
  e.preventDefault();
  let valido = true;

  const errores = ['nombre', 'correo', 'asunto', 'mensaje'];
  errores.forEach(id => {
    document.getElementById('error-' + id).textContent = '';
  });

  const nombre = document.getElementById('nombre').value.trim();
  const correo = document.getElementById('correo').value;
  const asunto = document.getElementById('asunto').value;
  const mensajeVal = document.getElementById('mensaje').value.trim();

  if (!nombre) {
    document.getElementById('error-nombre').textContent = 'El nombre es obligatorio.';
    valido = false;
  }
  if (!validarCorreo(correo)) {
    document.getElementById('error-correo').textContent = 'Introduce un correo válido.';
    valido = false;
  }
  if (!asunto) {
    document.getElementById('error-asunto').textContent = 'Selecciona un asunto.';
    valido = false;
  }
  if (!mensajeVal || mensajeVal.length < 10) {
    document.getElementById('error-mensaje').textContent = 'El mensaje debe tener al menos 10 caracteres.';
    valido = false;
  }

  if (valido) {
    formulario.reset();
    contador.textContent = '0';
    mensajeExito.classList.remove('d-none');
    setTimeout(() => mensajeExito.classList.add('d-none'), 5000);
  }
});