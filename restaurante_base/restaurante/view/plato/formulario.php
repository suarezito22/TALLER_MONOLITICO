<link rel="stylesheet" href="css/formulario.css">
<div class="form-container">
    <h2><?= isset($plato) ? 'Editar Plato' : 'Registrar Plato' ?></h2>

    <form action="router.php?controller=plato&action=<?= isset($plato) ? 'actualizar' : 'guardar' ?>" method="POST">
        <?php if (isset($plato)): ?>
            <input type="hidden" name="id" value="<?= $plato['id'] ?>">
        <?php endif; ?>

        <label>Nombre del plato:</label><br>
        <input type="text" name="descripcion" required value="<?= isset($plato) ? htmlspecialchars($plato['descripcion']) : '' ?>"><br><br>

        <?php if (!isset($plato)): ?>
            <label>Categoría:</label><br>
            <select name="id_categoria" required>
                <option value="">Seleccione</option>
                <?php while ($cat = $categorias->fetch_assoc()): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                <?php endwhile; ?>
            </select><br><br>

            <label>Cantidad disponible:</label><br>
            <input type="number" name="cantidad" min="1" required><br><br>
        <?php endif; ?>

        <label>Precio Unitario:</label><br>
        <input type="number" name="precio_unitario" step="0.01" required value="<?= isset($plato) ? $plato['precio_unitario'] : '' ?>"><br><br>

        <button type="submit"><?= isset($plato) ? 'Actualizar' : 'Guardar' ?></button>
    </form>

    <br><br>
    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
