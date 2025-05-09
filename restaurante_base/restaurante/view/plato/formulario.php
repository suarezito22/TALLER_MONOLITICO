<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Plato</title>
    <link rel="stylesheet" href="css/formulario.css">
    <script src="js/formulario.js" defer></script>
</head>
<body>
    <div class="form-container">
        <h2>Registrar Plato</h2>
        <form action="router.php?controller=plato&action=guardar" method="POST">
            <label>Nombre del plato:</label>
            <input type="text" name="descripcion" required>

            <label>Categoría:</label>
            <select name="id_categoria" required>
                <option value="">Seleccione</option>
                <?php while ($cat = $categorias->fetch_assoc()): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['nombre'] ?></option>
                <?php endwhile; ?>
            </select>

            <label>Cantidad disponible:</label>
            <input type="number" name="cantidad" min="1" required>

            <label>Precio Unitario:</label>
            <input type="number" name="precio_unitario" step="0.01" required>

            <button type="submit">Guardar</button>
        </form>

        <a href="index.php">
            <button type="button">Volver al Menú</button>
        </a>
    </div>
</body>
</html>
