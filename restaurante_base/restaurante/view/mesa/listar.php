<div class="menu-container">
    <?php
    session_start();
    if (!empty($_SESSION['mensaje_error'])): ?>
        <div style="color: red; font-weight: bold;">
            <?= $_SESSION['mensaje_error'] ?>
        </div>
    <?php unset($_SESSION['mensaje_error']); endif; ?>

    <h2>Lista de Mesas</h2>
    <a href="router.php?controller=mesa&action=crear">Agregar Nueva Mesa</a>
    <link rel="stylesheet" href="css/listar.css">
    <br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre de la Mesa</th>
            <th>Acción</th>
        </tr>
        <?php while ($m = $mesas->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($m['id']) ?></td>
            <td><?= htmlspecialchars($m['nombre']) ?></td>
            <td>
                <a href="router.php?controller=mesa&action=editar&id=<?= $m['id'] ?>">Editar</a> |
                <a href="router.php?controller=mesa&action=eliminar&id=<?= $m['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar esta mesa?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br><br>
    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
