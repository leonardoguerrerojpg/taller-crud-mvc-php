document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.getElementById('form-producto');
    const alertaError = document.getElementById('alerta-error');

    if (!formulario) return;

    formulario.addEventListener('submit', (evento) => {
        let errores = [];

        const nombre = document.getElementById('nombre').value.trim();
        const categoriaId = document.getElementById('categoria_id').value;
        const precio = parseFloat(document.getElementById('precio').value);
        const stock = parseInt(document.getElementById('stock').value, 10);

        // Validaciones en el cliente
        if (nombre === '') {
            errores.push('El nombre del producto es obligatorio.');
        }

        if (categoriaId === '') {
            errores.push('Debe seleccionar una categoría para el producto.');
        }

        if (isNaN(precio) || precio <= 0) {
            errores.push('El precio debe ser un número positivo mayor que 0.');
        }

        if (isNaN(stock) || stock < 0) {
            errores.push('El stock debe ser un número entero mayor o igual a 0.');
        }

        // Si existen errores, se detiene el envío y se muestran alertas en pantalla
        if (errores.length > 0) {
            evento.preventDefault();
            alertaError.innerHTML = '<strong>Corrija los siguientes errores:</strong><ul style="margin-top: 5px; padding-left: 20px;">' +
                errores.map(err => `<li>${err}</li>`).join('') +
                '</ul>';
            alertaError.style.display = 'block';
            window.scrollTo({ top: alertaError.offsetTop - 50, behavior: 'smooth' });
        } else {
            alertaError.style.display = 'none';
        }
    });
});