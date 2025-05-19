<link rel="stylesheet" href="css/ordenes.css">

<div class="container">
    <h2>Registrar Nueva Orden</h2>

    <?php
    session_start();
    if (!empty($_SESSION['errores'])): ?>
        <div class="error-message">
            <ul>
                <?php foreach ($_SESSION['errores'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; unset($_SESSION['errores']); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="router.php?controller=orden&action=guardar" method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <label for="id_mesa">Mesa:</label>
        <select name="id_mesa" required>
            <option value="">Seleccione</option>
            <?php while ($m = $mesas->fetch_assoc()): ?>
                <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?></option>
            <?php endwhile; ?>
        </select>

        <h3>Platos disponibles</h3>
        <?php while ($p = $platos->fetch_assoc()): ?>
            <div>
                <label>
                    <?= $p['descripcion'] ?> (<?= $p['categoria'] ?>) - 
                    $<?= $p['precio_unitario'] ?> - 
                    Stock: <?= $p['cantidad'] ?>
                </label>
                <input type="hidden" name="platos[<?= $p['id'] ?>][id]" value="<?= $p['id'] ?>">
                <input type="hidden" name="platos[<?= $p['id'] ?>][precio]" value="<?= $p['precio_unitario'] ?>">
                <input type="number" name="platos[<?= $p['id'] ?>][cantidad]" placeholder="Cantidad" min="0" max="<?= $p['cantidad'] ?>">
            </div>
        <?php endwhile; ?>

        <button type="submit">Guardar Orden</button>
    </form>

    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>

