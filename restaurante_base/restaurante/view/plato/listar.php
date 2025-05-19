<div class="menu-container">
    <?php
    session_start();
    if (!empty($_SESSION['mensaje_error'])): ?>
        <div style="color: red; font-weight: bold; margin-bottom: 10px;">
            <?= $_SESSION['mensaje_error'] ?>
        </div>
    <?php unset($_SESSION['mensaje_error']); endif; ?>

    <h2>Lista de Platos</h2>
    <a href="router.php?controller=plato&action=crear">Agregar Nuevo Plato</a>
    <link rel="stylesheet" href="css/listar.css">
    <br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php while ($p = $platos->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['descripcion']) ?></td>
            <td><?= htmlspecialchars($p['categoria']) ?></td>
            <td><?= htmlspecialchars($p['cantidad']) ?></td>
            <td><?= htmlspecialchars($p['precio_unitario']) ?></td>
            <td>
                <a href="router.php?controller=plato&action=editar&id=<?= urlencode($p['id']) ?>">Editar</a> |
                <a href="router.php?controller=plato&action=eliminar&id=<?= urlencode($p['id']) ?>" onclick="return confirm('¿Seguro que deseas eliminar este plato?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br><br>
   <br><br>
    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
