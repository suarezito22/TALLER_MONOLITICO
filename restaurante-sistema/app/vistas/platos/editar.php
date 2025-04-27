<?php
require_once __DIR__ . '/../../controladores/PlatoControlador.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$plato = PlatoControlador::obtenerPorId($id);
$categorias = PlatoControlador::listarCategorias();

if (!$plato) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $categoria_id = $_POST['categoria_id'];
    $precio_unitario = $_POST['precio_unitario'];
    PlatoControlador::editar($id, $descripcion, $categoria_id, $precio_unitario);
    header('Location: index.php');
}
?>

<h1>Editar Plato</h1>

<form method="POST">
    <label>Descripción:</label>
    <input type="text" name="descripcion" value="<?= $plato['descripcion'] ?>" required><br><br>

    <label>Categoría:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>" <?= $plato['categoria_id'] == $categoria['id'] ? 'selected' : '' ?>>
                <?= $categoria['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Precio Unitario:</label>
    <input type="number" step="0.01" name="precio_unitario" value="<?= $plato['precio_unitario'] ?>" required><br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">Volver</a>