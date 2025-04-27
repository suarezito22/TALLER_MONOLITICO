<?php
require_once __DIR__ . '/../../controladores/PlatoControlador.php';
$categorias = PlatoControlador::listarCategorias();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $categoria_id = $_POST['categoria_id'];
    $precio_unitario = $_POST['precio_unitario'];
    PlatoControlador::crear($descripcion, $categoria_id, $precio_unitario);
    header('Location: index.php');
}
?>

<h1>Crear Nuevo Plato</h1>

<form method="POST">
    <label>Descripción:</label>
    <input type="text" name="descripcion" required><br><br>

    <label>Categoría:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Precio Unitario:</label>
    <input type="number" step="0.01" name="precio_unitario" required><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php">Volver</a>