<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Órdenes Anuladas</title>
    <link rel="stylesheet" href="css/anuladas.css">
</head>
<body>
    <div class="container">
        <h2>Reporte de Órdenes Anuladas</h2>

        <form method="POST" action="router.php?controller=reporte&action=anuladas">
            <label>Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" value="<?= $fechaInicio ?>" required>

            <label>Fecha Fin:</label>
            <input type="date" name="fecha_fin" value="<?= $fechaFin ?>" required>

            <button type="submit">Generar Reporte</button>
        </form>

        <?php if (!empty($ordenes)): ?>
            <h3>Órdenes Anuladas</h3>
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

            <p><strong>Total de Órdenes Anuladas:</strong> $<?= $total ?></p>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>No se encontraron órdenes anuladas en el rango.</p>
        <?php endif; ?>

        <br><br>
        <a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
    <button type="button">Volver al Menú</button>
</a>

    </div>
</body>
</html>
