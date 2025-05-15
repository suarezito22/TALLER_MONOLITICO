<link rel="stylesheet" href="css/index.css">
<script src="js/index.js"></script>

<div class="header">
    <h1>🍽️ Menú Principal del Restaurante</h1>
</div>

<nav class="navbar">
    <ul class="menu">
        <li class="menu-item">
            <a href="#">Gestión de Platos</a>
            <ul class="submenu">
                <li><a href="router.php?controller=plato&action=listar">Ver Platos</a></li>
                <li><a href="router.php?controller=plato&action=crear">Registrar Nuevo Plato</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#">Gestión de Categorías</a>
            <ul class="submenu">
                <li><a href="router.php?controller=categoria&action=listar">Ver Categorías</a></li>
                <li><a href="router.php?controller=categoria&action=crear">Registrar Nueva Categoría</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#">Gestión de Mesas</a>
            <ul class="submenu">
                <li><a href="router.php?controller=mesa&action=listar">Ver Mesas</a></li>
                <li><a href="router.php?controller=mesa&action=crear">Registrar Nueva Mesa</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#">Órdenes</a>
            <ul class="submenu">
                <li><a href="router.php?controller=orden&action=listar">Ver Órdenes</a></li>
                <li><a href="router.php?controller=orden&action=crear">Registrar Nueva Orden</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#">Reportes</a>
            <ul class="submenu">
                <li><a href="router.php?controller=reporte&action=general">Órdenes No Anuladas</a></li>
                <li><a href="router.php?controller=reporte&action=anuladas">Órdenes Anuladas</a></li>
            </ul>
        </li>
    </ul>
</nav>

