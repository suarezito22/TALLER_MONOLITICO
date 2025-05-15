<link rel="stylesheet" href="css/formulario_categoria.css">
<div class="menu-container">
    <h2><?= isset($categoria) ? 'Editar Categoría' : 'Registrar Nueva Categoría' ?></h2>

    <form action="router.php?controller=categoria&action=<?= isset($categoria) ? 'actualizar' : 'guardar' ?>" method="POST">
        <?php if (isset($categoria)): ?>
            <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
        <?php endif; ?>

        <label>Nombre de la categoría:</label>
        <input type="text" name="nombre" value="<?= isset($categoria) ? $categoria['nombre'] : '' ?>" required>

        <button type="submit"><?= isset($categoria) ? 'Actualizar' : 'Guardar' ?></button>
    </form>

    <a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
