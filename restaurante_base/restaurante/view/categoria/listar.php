<link rel="stylesheet" href="css/listarcategoria.css">
<div class="menu-container">
    <h2>Lista de Categorías</h2>
    <a href="router.php?controller=categoria&action=crear">Agregar Nueva Categoría</a>
    <br><br>

    <table border="1">
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
                <a href="router.php?controller=categoria&action=eliminar&id=<?= $c['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br><br>
     
    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
