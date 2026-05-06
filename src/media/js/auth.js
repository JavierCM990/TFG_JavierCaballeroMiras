// ── UTILIDADES ──
function validarCorreo(correo) {
  return /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/.test(correo);
}

function validarContrasena(contrasena) {
  return (
    contrasena.length >= 8 &&
    /[A-Z]/.test(contrasena) &&
    /[a-z]/.test(contrasena) &&
    /[0-9]/.test(contrasena) &&
    /[^A-Za-z0-9]/.test(contrasena)
  );
}

// ── MOSTRAR/OCULTAR CONTRASEÑA ──
const botonMostrar = document.getElementById('mostrar-contrasena');
if (botonMostrar) {
  botonMostrar.addEventListener('click', function () {
    const campo = document.getElementById('contrasena');
    const icono = this.querySelector('i');
    if (campo.type === 'password') {
      campo.type = 'text';
      icono.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
      campo.type = 'password';
      icono.classList.replace('bi-eye-slash', 'bi-eye');
    }
  });
}

// ── FORTALEZA DE CONTRASEÑA (solo registro) ──
const campoCont = document.getElementById('contrasena');
const barraFortaleza = document.getElementById('barra-fortaleza');
const textoFortaleza = document.getElementById('texto-fortaleza');

if (campoCont && barraFortaleza) {
  campoCont.addEventListener('input', function () {
    const valor = this.value;
    let puntos = 0;
    if (valor.length >= 8) puntos++;
    if (/[A-Z]/.test(valor)) puntos++;
    if (/[a-z]/.test(valor)) puntos++;
    if (/[0-9]/.test(valor)) puntos++;
    if (/[^A-Za-z0-9]/.test(valor)) puntos++;

    const niveles = [
      { porcentaje: 0,   color: '',           texto: '' },
      { porcentaje: 20,  color: 'bg-danger',  texto: 'Muy débil' },
      { porcentaje: 40,  color: 'bg-danger',  texto: 'Débil' },
      { porcentaje: 60,  color: 'bg-warning', texto: 'Moderada' },
      { porcentaje: 80,  color: 'bg-info',    texto: 'Buena' },
      { porcentaje: 100, color: 'bg-success', texto: 'Muy segura' }
    ];

    const nivel = niveles[puntos];
    barraFortaleza.style.width = nivel.porcentaje + '%';
    barraFortaleza.className = 'progress-bar ' + nivel.color;
    textoFortaleza.textContent = nivel.texto;
  });
}

// ── VALIDACIÓN LOGIN ──
const formularioLogin = document.getElementById('formulario-login');
if (formularioLogin) {
  formularioLogin.addEventListener('submit', function (e) {
    e.preventDefault();
    let valido = true;

    document.getElementById('error-correo').textContent = '';
    document.getElementById('error-contrasena').textContent = '';

    const correo = document.getElementById('correo').value;
    const contrasena = document.getElementById('contrasena').value;

    if (!validarCorreo(correo)) {
      document.getElementById('error-correo').textContent = 'Introduce un correo válido (ej: nombre@dominio.com).';
      valido = false;
    }
    if (!validarContrasena(contrasena)) {
      document.getElementById('error-contrasena').textContent = 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.';
      valido = false;
    }

    if (valido) {
      alert('Formulario correcto — pendiente de conectar con PHP');
    }
  });
}

// ── VALIDACIÓN REGISTRO ──
const formularioRegistro = document.getElementById('formulario-registro');
if (formularioRegistro) {
  formularioRegistro.addEventListener('submit', function (e) {
    e.preventDefault();
    let valido = true;

    const errores = ['nombre', 'apellidos', 'correo', 'contrasena', 'contrasena2', 'terminos'];
    errores.forEach(id => {
      const el = document.getElementById('error-' + id);
      if (el) el.textContent = '';
    });

    const nombre = document.getElementById('nombre').value.trim();
    const apellidos = document.getElementById('apellidos').value.trim();
    const correo = document.getElementById('correo').value;
    const contrasena = document.getElementById('contrasena').value;
    const contrasena2 = document.getElementById('contrasena2').value;
    const terminos = document.getElementById('terminos').checked;

    if (!nombre) {
      document.getElementById('error-nombre').textContent = 'El nombre es obligatorio.';
      valido = false;
    }
    if (!apellidos) {
      document.getElementById('error-apellidos').textContent = 'Los apellidos son obligatorios.';
      valido = false;
    }
    if (!validarCorreo(correo)) {
      document.getElementById('error-correo').textContent = 'Introduce un correo válido (ej: nombre@dominio.com).';
      valido = false;
    }
    if (!validarContrasena(contrasena)) {
      document.getElementById('error-contrasena').textContent = 'Mínimo 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.';
      valido = false;
    }
    if (contrasena !== contrasena2) {
      document.getElementById('error-contrasena2').textContent = 'Las contraseñas no coinciden.';
      valido = false;
    }
    if (!terminos) {
      document.getElementById('error-terminos').textContent = 'Debes aceptar los términos y condiciones.';
      valido = false;
    }

    if (valido) {
      alert('Formulario correcto — pendiente de conectar con PHP');
    }
  });
}