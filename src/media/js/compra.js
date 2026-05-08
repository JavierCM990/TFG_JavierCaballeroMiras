function validarCorreo(correo) {
  return /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/.test(correo);
}

document.getElementById('formulario-pago').addEventListener('submit', function (e) {
  e.preventDefault();
  let valido = true;

  const campos = ['nombre', 'correo', 'numero-tarjeta', 'caducidad', 'cvv'];
  campos.forEach(id => {
    document.getElementById('error-' + id).textContent = '';
  });

  const nombre = document.getElementById('nombre').value.trim();
  const correo = document.getElementById('correo').value;
  const numero = document.getElementById('numero-tarjeta').value.trim();
  const caducidad = document.getElementById('caducidad').value;
  const cvv = document.getElementById('cvv').value;

  if (!nombre) {
    document.getElementById('error-nombre').textContent = 'El nombre es obligatorio.';
    valido = false;
  }
  if (!validarCorreo(correo)) {
    document.getElementById('error-correo').textContent = 'Introduce un correo válido.';
    valido = false;
  }
  if (numero.length !== 16 || isNaN(numero)) {
    document.getElementById('error-numero-tarjeta').textContent = 'El número debe tener 16 dígitos.';
    valido = false;
  }
  if (!/^\d{2}\/\d{2}$/.test(caducidad)) {
    document.getElementById('error-caducidad').textContent = 'Formato: MM/AA.';
    valido = false;
  }
  if (!/^\d{3}$/.test(cvv)) {
    document.getElementById('error-cvv').textContent = 'El CVV debe tener 3 dígitos.';
    valido = false;
  }

  if (valido) {
    window.location.href = 'confirmacion.php';
  }
});