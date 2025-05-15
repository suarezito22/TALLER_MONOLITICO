document.addEventListener('DOMContentLoaded', function() {
    // Obtenemos todos los elementos del menú que tienen submenú
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        // Cuando el ratón entra en el área de un item del menú
        item.addEventListener('mouseenter', function() {
            const submenu = item.querySelector('.submenu');
            if (submenu) {
                submenu.style.display = 'block';  // Mostramos el submenú
            }
        });

        // Cuando el ratón sale del área de un item del menú
        item.addEventListener('mouseleave', function() {
            const submenu = item.querySelector('.submenu');
            if (submenu) {
                submenu.style.display = 'none';  // Ocultamos el submenú
            }
        });
    });
});
