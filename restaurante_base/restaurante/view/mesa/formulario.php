<link rel="stylesheet" href="css/formulario.css">
<div class="form-container">
    <h2><?= isset($mesa) ? 'Editar Mesa' : 'Registrar Nueva Mesa' ?></h2>

    <form action="router.php?controller=mesa&action=<?= isset($mesa) ? 'actualizar' : 'guardar' ?>" method="POST">
        <?php if (isset($mesa)): ?>
            <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
        <?php endif; ?>

        <label>Nombre de la Mesa:</label><br>
        <input type="text" name="nombre" required value="<?= isset($mesa) ? htmlspecialchars($mesa['nombre']) : '' ?>"><br><br>

        <button type="submit"><?= isset($mesa) ? 'Actualizar' : 'Guardar' ?></button>
    </form>

    <br><br>
    <a href="index.php">
        <button type="button">Volver al Menú</button>
    </a>
</div>
