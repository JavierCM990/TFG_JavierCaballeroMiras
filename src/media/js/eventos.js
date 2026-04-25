const tarjetas = document.querySelectorAll('.tarjeta-wrap');
const contador = document.getElementById('contador-eventos');
const sinResultados = document.getElementById('sin-resultados');

function filtrar() {
  const texto = document.getElementById('buscar-texto').value.toLowerCase();
  const categoriasSeleccionadas = [...document.querySelectorAll('.filtro-cat:checked')].map(c => c.value);
  const precioMax = parseInt(document.getElementById('precio-range').value);
  const fechaDesde = document.getElementById('fecha-desde').value;
  const fechaHasta = document.getElementById('fecha-hasta').value;

  let visibles = 0;

  tarjetas.forEach(tarjeta => {
    const cat = tarjeta.dataset.categoria;
    const precio = parseInt(tarjeta.dataset.precio);
    const fecha = tarjeta.dataset.fecha;
    const titulo = tarjeta.querySelector('.tarjeta-titulo').textContent.toLowerCase();

    const okTexto = titulo.includes(texto);
    const okCat = categoriasSeleccionadas.length === 0 || categoriasSeleccionadas.includes(cat);
    const okPrecio = precio <= precioMax;
    const okFechaDesde = !fechaDesde || fecha >= fechaDesde;
    const okFechaHasta = !fechaHasta || fecha <= fechaHasta;

    if (okTexto && okCat && okPrecio && okFechaDesde && okFechaHasta) {
      tarjeta.classList.remove('d-none');
      visibles++;
    } else {
      tarjeta.classList.add('d-none');
    }
  });

  contador.textContent = visibles;
  sinResultados.classList.toggle('d-none', visibles > 0);
}

function limpiar() {
  document.getElementById('buscar-texto').value = '';
  document.querySelectorAll('.filtro-cat').forEach(c => c.checked = false);
  document.getElementById('precio-range').value = 150;
  document.getElementById('precio-valor').textContent = '150€';
  document.getElementById('fecha-desde').value = '';
  document.getElementById('fecha-hasta').value = '';
  filtrar();
}

// Eventos
document.getElementById('buscar-texto').addEventListener('input', filtrar);
document.querySelectorAll('.filtro-cat').forEach(c => c.addEventListener('change', filtrar));
document.getElementById('precio-range').addEventListener('input', function() {
  document.getElementById('precio-valor').textContent = this.value + '€';
  filtrar();
});
document.getElementById('fecha-desde').addEventListener('change', filtrar);
document.getElementById('fecha-hasta').addEventListener('change', filtrar);
document.getElementById('btn-limpiar').addEventListener('click', limpiar);
document.getElementById('btn-limpiar2').addEventListener('click', limpiar);

// Ordenar
document.getElementById('ordenar').addEventListener('change', function() {
  const lista = document.getElementById('lista-eventos');
  const tarjetasArray = [...tarjetas];

  tarjetasArray.sort((a, b) => {
    if (this.value === 'precio-asc') return parseInt(a.dataset.precio) - parseInt(b.dataset.precio);
    if (this.value === 'precio-desc') return parseInt(b.dataset.precio) - parseInt(a.dataset.precio);
    return a.dataset.fecha.localeCompare(b.dataset.fecha);
  });

  tarjetasArray.forEach(t => lista.appendChild(t));
});