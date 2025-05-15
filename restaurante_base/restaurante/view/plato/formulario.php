<link rel="stylesheet" href="css/formulario.css">
<div class="form-container">
    <h2>Registrar Plato</h2>
    <form action="router.php?controller=plato&action=guardar" method="POST">
        <label>Nombre del plato:</label><br>
        <input type="text" name="descripcion" required><br><br>

        <label>Categoría:</label><br>
        <select name="id_categoria" required>
            <option value="">Seleccione</option>
            <?php while ($cat = $categorias->fetch_assoc()): ?>
                <option value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Cantidad disponible:</label><br>
        <input type="number" name="cantidad" min="1" required><br><br>

        <label>Precio Unitario:</label><br>
        <input type="number" name="precio_unitario" step="0.01" required><br><br>

        <button type="submit">Guardar</button>
    </form>
    <br><br>
    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
