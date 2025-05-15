<link rel="stylesheet" href="css/ordenes.css">

<div class="container">
    <h2>Lista de Órdenes</h2>

    <a href="router.php?controller=orden&action=crear">
        <button type="button">Registrar Nueva Orden</button>
    </a>

    <table>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Mesa</th>
            <th>Total</th>
            <th>Anulada</th>
            <th>Acciones</th>
        </tr>
        <?php while ($o = $ordenes->fetch_assoc()): ?>
        <tr>
            <td><?= $o['id'] ?></td>
            <td><?= $o['fecha'] ?></td>
            <td><?= $o['mesa'] ?></td>
            <td>$<?= $o['total'] ?></td>
            <td><?= $o['anulada'] ? 'Sí' : 'No' ?></td>
            <td>
                <a href="router.php?controller=orden&action=detalle&id=<?= $o['id'] ?>">Ver Detalle</a>
                <?php if (!$o['anulada']): ?>
                    | <a href="router.php?controller=orden&action=anular&id=<?= $o['id'] ?>" onclick="return confirm('¿Anular esta orden?')">Anular</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
