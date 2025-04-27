<?php
require_once __DIR__ . '/../../controladores/MesaControlador.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$mesas = MesaControlador::listar();
$mesaActual = null;

foreach ($mesas as $mesa) {
    if ($mesa['id'] == $id) {
        $mesaActual = $mesa;
        break;
    }
}

if (!$mesaActual) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    MesaControlador::editar($id, $nombre);
    header('Location: index.php');
}
?>

<h1>Editar Mesa</h1>

<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $mesaActual['nombre'] ?>" required>
    <br><br>
    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">Volver</a>