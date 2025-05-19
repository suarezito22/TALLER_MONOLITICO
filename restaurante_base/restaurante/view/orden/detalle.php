<link rel="stylesheet" href="css/ordenes.css">

<div class="container">
    <h2>Detalle de la Orden #<?= $orden['id'] ?></h2>

    <p><strong>Fecha:</strong> <?= $orden['fecha'] ?></p>
    <p><strong>ID Mesa:</strong> <?= $orden['id_mesa'] ?></p>
    <p><strong>Total:</strong> $<?= $orden['total'] ?></p>
    <p><strong>Anulada:</strong> <?= $orden['anulada'] ? 'Sí' : 'No' ?></p>

    <h3>Platos ordenados:</h3>
    <table>
        <tr>
            <th>Plato</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($d = $detalle->fetch_assoc()): ?>
        <tr>
            <td><?= $d['descripcion'] ?></td>
            <td><?= $d['cantidad'] ?></td>
            <td>$<?= $d['precio_unitario'] ?></td>
            <td>$<?= $d['cantidad'] * $d['precio_unitario'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

     <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
