<h2><?= isset($categoria) ? 'Editar Categoría' : 'Registrar Nueva Categoría' ?></h2>

<form action="router.php?controller=categoria&action=<?= isset($categoria) ? 'actualizar' : 'guardar' ?>" method="POST">
    <?php if (isset($categoria)): ?>
        <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
    <?php endif; ?>

    <label>Nombre de la categoría:</label><br>
    <input type="text" name="nombre" value="<?= isset($categoria) ? $categoria['nombre'] : '' ?>" required><br><br>

    <button type="submit"><?= isset($categoria) ? 'Actualizar' : 'Guardar' ?></button>
</form>

<br><br>
<a href="../../index.php">
    <button type="button">Volver al Menú</button>
</a>
