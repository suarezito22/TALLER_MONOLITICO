document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const descripcion = form.querySelector('input[name="descripcion"]');

    descripcion.addEventListener('input', () => {
        descripcion.value = descripcion.value.toUpperCase();
    });
});
