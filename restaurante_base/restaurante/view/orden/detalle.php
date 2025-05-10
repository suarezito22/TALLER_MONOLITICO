<!-- view/orden/detalle.php -->
<div class="container">
    <h2>Detalle de la Orden #<?= $orden['id'] ?></h2>
    <p><strong>Fecha:</strong> <?= $orden['fecha'] ?></p>
    <p><strong>ID Mesa:</strong> <?= $orden['id_mesa'] ?></p>
    <p><strong>Total:</strong> $<?= number_format($total, 2) ?></p>
    <p><strong>Anulada:</strong> <?= $orden['anulada'] ? 'Sí' : 'No' ?></p>
    
    <h3>Platos ordenados:</h3>
    <table>
        <thead>
            <tr>
                <th>Plato</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = $detalle->fetch_assoc()): ?>
                <tr>
                    <td><?= $item['descripcion'] ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td>$<?= number_format($item['precio_unitario'], 2) ?></td>
                    <td>$<?= number_format($item['cantidad'] * $item['precio_unitario'], 2) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <br>
    <a href="router.php?controller=orden&action=listar">
        <button type="button">Volver al Menú</button>
    </a>
</div>
