const precios = { general: 25, preferente: 45, vip: 120 };
let cantidad = 1;
let precioActual = 25;
let tipoActual = 'General';

// Selección tipo de entrada
document.querySelectorAll('input[name="tipo-entrada"]').forEach(radio => {
  radio.addEventListener('change', function () {
    tipoActual = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    precioActual = precios[this.value];
    actualizarResumen();
  });
});

// Cantidad
document.getElementById('btn-menos').addEventListener('click', () => {
  if (cantidad > 1) { cantidad--; actualizarResumen(); }
});

document.getElementById('btn-mas').addEventListener('click', () => {
  if (cantidad < 10) { cantidad++; actualizarResumen(); }
});

function actualizarResumen() {
  document.getElementById('cantidad-valor').textContent = cantidad;
  document.getElementById('resumen-tipo').textContent = tipoActual;
  document.getElementById('resumen-cantidad').textContent = cantidad + (cantidad === 1 ? ' entrada' : ' entradas');
  document.getElementById('resumen-precio-unit').textContent = precioActual + '€';
  document.getElementById('resumen-total').textContent = (precioActual * cantidad) + '€';
}