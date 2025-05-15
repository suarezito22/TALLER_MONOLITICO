<link rel="stylesheet" href="css/general.css">

<div class="menu-container">
    <h2>Reporte de Órdenes No Anuladas</h2>

    <form method="POST" action="router.php?controller=reporte&action=general">
        <div class="form-group">
            <label>Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" value="<?= $fechaInicio ?>" required>
        </div>
        <div class="form-group">
            <label>Fecha Fin:</label>
            <input type="date" name="fecha_fin" value="<?= $fechaFin ?>" required>
        </div>
        <button type="submit">Generar Reporte</button>
    </form>

    <?php if (!empty($ordenes)): ?>
        <div class="report-section">
            <h3>Órdenes Registradas</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Mesa</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($ordenes as $o): ?>
                <tr>
                    <td><?= $o['id'] ?></td>
                    <td><?= $o['fecha'] ?></td>
                    <td><?= $o['mesa'] ?></td>
                    <td>$<?= $o['total'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <p><strong>Total Recaudado:</strong> $<?= $total ?></p>

            <h3>Platos Más Vendidos</h3>
            <table>
                <tr>
                    <th>Plato</th>
                    <th>Cantidad Vendida</th>
                </tr>
                <?php foreach ($ranking as $r): ?>
                <tr>
                    <td><?= $r['descripcion'] ?></td>
                    <td><?= $r['total_vendidos'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>No se encontraron órdenes en el rango de fechas.</p>
    <?php endif; ?>

    <a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>

