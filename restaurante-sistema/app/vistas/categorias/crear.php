<?php
require_once __DIR__ . '/../../controladores/CategoriaControlador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    CategoriaControlador::crear($nombre);
    header('Location: index.php');
}
?>

<h1>Crear Nueva Categoría</h1>

<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br><br>
    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php">Volver</a>