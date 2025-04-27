<?php
require_once __DIR__ . '/../../controladores/CategoriaControlador.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$categorias = CategoriaControlador::listar();
$categoriaActual = null;

foreach ($categorias as $cat) {
    if ($cat['id'] == $id) {
        $categoriaActual = $cat;
        break;
    }
}

if (!$categoriaActual) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    CategoriaControlador::editar($id, $nombre);
    header('Location: index.php');
}
?>

<h1>Editar Categoría</h1>

<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $categoriaActual['nombre'] ?>" required>
    <br><br>
    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">Volver</a>