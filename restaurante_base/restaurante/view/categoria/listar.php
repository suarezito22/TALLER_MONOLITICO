<!-- listar_categorias.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Categorías</title>
    <link rel="stylesheet" href="css/listarcategoria.css">
</head>
<body>
    <div class="menu-container">
        <h2>Lista de Categorías</h2>

        <!-- Enlace para agregar nueva categoría -->
        <a href="router.php?controller=categoria&action=crear">Agregar Nueva Categoría</a>
        <br><br>

        <!-- Tabla de categorías -->
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php while ($c = $categorias->fetch_assoc()): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['nombre'] ?></td>
                <td>
                    <a href="router.php?controller=categoria&action=editar&id=<?= $c['id'] ?>">Editar</a> |
                    <a href="router.php?controller=categoria&action=eliminar&id=<?= $c['id'] ?>" 
                       onclick="return confirm('¿Estás seguro de eliminar esta categoría?')" 
                       style="color: red; font-weight: bold;">
                       Eliminar
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <br><br>
        <!-- Botón para volver al menú -->
        <a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
            <button type="button">Volver al Menú</button>
        </a>
    </div>
</body>
</html>

