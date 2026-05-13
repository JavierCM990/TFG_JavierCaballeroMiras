const formularioEvento = document.getElementById('formulario-evento');

if (formularioEvento) {
  formularioEvento.addEventListener('submit', function (e) {
    e.preventDefault();
    let valido = true;

    const campos = ['nombre', 'categoria', 'fecha', 'hora', 'lugar', 'descripcion', 'precio-general', 'entradas'];
    campos.forEach(id => {
      const el = document.getElementById('error-' + id);
      if (el) el.textContent = '';
    });

    const nombre = document.getElementById('nombre').value.trim();
    const categoria = document.getElementById('categoria').value;
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;
    const lugar = document.getElementById('lugar').value.trim();
    const descripcion = document.getElementById('descripcion').value.trim();
    const precioGeneral = document.getElementById('precio-general').value;
    const entradas = document.getElementById('entradas').value;

    if (!nombre) {
      document.getElementById('error-nombre').textContent = 'El nombre es obligatorio.';
      valido = false;
    }
    if (!categoria) {
      document.getElementById('error-categoria').textContent = 'Selecciona una categoría.';
      valido = false;
    }
    if (!fecha) {
      document.getElementById('error-fecha').textContent = 'La fecha es obligatoria.';
      valido = false;
    }
    if (!hora) {
      document.getElementById('error-hora').textContent = 'La hora es obligatoria.';
      valido = false;
    }
    if (!lugar) {
      document.getElementById('error-lugar').textContent = 'El lugar es obligatorio.';
      valido = false;
    }
    if (!descripcion) {
      document.getElementById('error-descripcion').textContent = 'La descripción es obligatoria.';
      valido = false;
    }
    if (!precioGeneral || precioGeneral <= 0) {
      document.getElementById('error-precio-general').textContent = 'Introduce un precio válido.';
      valido = false;
    }
    if (!entradas || entradas <= 0) {
      document.getElementById('error-entradas').textContent = 'Introduce el número de entradas.';
      valido = false;
    }

    if (valido) {
      formularioEvento.submit();
    }
  });
}