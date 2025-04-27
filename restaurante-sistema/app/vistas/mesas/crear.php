<?php
require_once __DIR__ . '/../../controladores/MesaControlador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    MesaControlador::crear($nombre);
    header('Location: index.php');
}
?>

<h1>Crear Nueva Mesa</h1>

<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br><br>
    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php">Volver</a>