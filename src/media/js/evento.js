const precios = {};
let cantidad = 1;
let precioActual = 0;
let tipoActual = 'general';

// Cargar precios desde los data-precio de los inputs
document.querySelectorAll('input[name="tipo-entrada"]').forEach(radio => {
    precios[radio.value] = parseFloat(radio.dataset.precio);
});

// Precio inicial
const radioInicial = document.querySelector('input[name="tipo-entrada"]:checked');
if (radioInicial) {
    precioActual = parseFloat(radioInicial.dataset.precio);
    tipoActual = radioInicial.value;
}

// Selección tipo de entrada
document.querySelectorAll('input[name="tipo-entrada"]').forEach(radio => {
    radio.addEventListener('change', function () {
        tipoActual = this.value;
        precioActual = parseFloat(this.dataset.precio);
        actualizarResumen();
        actualizarBotonComprar();
    });
});

// Cantidad
document.getElementById('btn-menos').addEventListener('click', () => {
    if (cantidad > 1) {
        cantidad--;
        actualizarResumen();
        actualizarBotonComprar();
    }
});

document.getElementById('btn-mas').addEventListener('click', () => {
    if (cantidad < 10) {
        cantidad++;
        actualizarResumen();
        actualizarBotonComprar();
    }
});

function actualizarResumen() {
    document.getElementById('cantidad-valor').textContent = cantidad;
    document.getElementById('resumen-tipo').textContent = tipoActual.charAt(0).toUpperCase() + tipoActual.slice(1);
    document.getElementById('resumen-cantidad').textContent = cantidad + (cantidad === 1 ? ' entrada' : ' entradas');
    document.getElementById('resumen-precio-unit').textContent = precioActual + '€';
    document.getElementById('resumen-total').textContent = (precioActual * cantidad) + '€';
}

function actualizarBotonComprar() {
    const boton = document.getElementById('btn-comprar');
    if (boton) {
        const url = new URL(boton.href);
        url.searchParams.set('tipo', tipoActual);
        url.searchParams.set('cantidad', cantidad);
        boton.href = url.toString();
    }
}

actualizarResumen();
actualizarBotonComprar();