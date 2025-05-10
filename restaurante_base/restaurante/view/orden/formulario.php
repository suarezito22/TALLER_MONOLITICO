<!-- En todas las vistas -->
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
        <label>Fecha:</label><br>
        <input type="date" name="fecha" required><br><br>

        <label>Mesa:</label><br>
        <select name="id_mesa" required>
            <option value="">Seleccione</option>
            <?php while ($m = $mesas->fetch_assoc()): ?>
                <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <h3>Platos disponibles</h3>
        <?php while ($p = $platos->fetch_assoc()): ?>
            <div>
                <label>
                    <?= $p['descripcion'] ?> (<?= $p['categoria'] ?>) - 
                    $<?= $p['precio'] ?> - <!-- Cambié "precio_unitario" por "precio" -->
                    Stock: <?= $p['cantidad'] ?>
                </label><br>
                <input type="hidden" name="platos[<?= $p['id'] ?>][id]" value="<?= $p['id'] ?>">
                <input type="hidden" name="platos[<?= $p['id'] ?>][precio]" value="<?= $p['precio'] ?>"> <!-- Cambié "precio_unitario" por "precio" -->
                <input type="number" name="platos[<?= $p['id'] ?>][cantidad]" placeholder="Cantidad" min="0" max="<?= $p['cantidad'] ?>">
                <br><br>
            </div>
        <?php endwhile; ?>

        <br><button type="submit">Generar Orden</button>
    </form>

    <br><br>
    <a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>

