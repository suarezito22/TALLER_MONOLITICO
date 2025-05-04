<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <h1>🍽️ Menú Principal del Restaurante</h1>
    
    <!-- Menú de Navegación -->
    <div class="navbar">
        <ul>
            <li><a href="#">Gestión de Platos</a>
                <ul>
                    <li><a href="router.php?controller=plato&action=listar">Ver Platos</a></li>
                    <li><a href="router.php?controller=plato&action=crear">Registrar Nuevo Plato</a></li>
                </ul>
            </li>
            <li><a href="#">Gestión de Categorías</a>
                <ul>
                    <li><a href="router.php?controller=categoria&action=listar">Ver Categorías</a></li>
                    <li><a href="router.php?controller=categoria&action=crear">Registrar Nueva Categoría</a></li>
                </ul>
            </li>
            <li><a href="#">Gestión de Mesas</a>
                <ul>
                    <li><a href="router.php?controller=mesa&action=listar">Ver Mesas</a></li>
                    <li><a href="router.php?controller=mesa&action=crear">Registrar Nueva Mesa</a></li>
                </ul>
            </li>
            <li><a href="#">Órdenes</a>
                <ul>
                    <li><a href="router.php?controller=orden&action=listar">Ver Órdenes</a></li>
                    <li><a href="router.php?controller=orden&action=crear">Registrar Nueva Orden</a></li>
                </ul>
            </li>
            <li><a href="#">Reportes</a>
                <ul>
                    <li><a href="router.php?controller=reporte&action=general">Órdenes No Anuladas</a></li>
                    <li><a href="router.php?controller=reporte&action=anuladas">Órdenes Anuladas</a></li>
                </ul>
            </li>
        </ul>
    </div>

</body>
</html>

