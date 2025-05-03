<h2><?= isset($mesa) ? 'Editar Mesa' : 'Registrar Nueva Mesa' ?></h2>

<form action="router.php?controller=mesa&action=<?= isset($mesa) ? 'actualizar' : 'guardar' ?>" method="POST">
    <?php if (isset($mesa)): ?>
        <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
    <?php endif; ?>

    <label>Nombre de la mesa:</label><br>
    <input type="text" name="nombre" value="<?= isset($mesa) ? $mesa['nombre'] : '' ?>" required><br><br>

    <button type="submit"><?= isset($mesa) ? 'Actualizar' : 'Guardar' ?></button>
</form>

<br><br>
<a href="../../index.php">
    <button type="button">Volver al Menú</button>
</a>
