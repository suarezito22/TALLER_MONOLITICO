<?php
require_once __DIR__ . '/../../controladores/PlatoControlador.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
PlatoControlador::eliminar($id);
header('Location: index.php');
?>