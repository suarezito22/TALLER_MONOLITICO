<?php
require_once __DIR__ . '/../../controladores/MesaControlador.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
MesaControlador::eliminar($id);
header('Location: index.php');
?>