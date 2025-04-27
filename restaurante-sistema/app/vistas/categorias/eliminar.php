<?php
require_once __DIR__ . '/../../controladores/CategoriaControlador.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
CategoriaControlador::eliminar($id);
header('Location: index.php');
?>