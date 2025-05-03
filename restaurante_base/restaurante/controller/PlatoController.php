<?php
require_once 'model/Plato.php';
require_once 'model/Categoria.php';

class PlatoController {
    public function listar() {
        $modelo = new Plato();
        $platos = $modelo->obtenerTodos();
        require 'view/plato/listar.php';
    }

    public function crear() {
        $categorias = (new Categoria())->obtenerTodos();
        require 'view/plato/formulario.php';
    }

    public function guardar() {
        if (isset($_POST['descripcion'], $_POST['id_categoria'], $_POST['precio_unitario'], $_POST['cantidad'])) {
            $descripcion = trim($_POST['descripcion']);
            $id_categoria = intval($_POST['id_categoria']);
            $precio_unitario = floatval($_POST['precio_unitario']);
            $cantidad = intval($_POST['cantidad']);

            if ($descripcion !== "" && $id_categoria > 0 && $precio_unitario > 0 && $cantidad > 0) {
                $plato = new Plato();
                $plato->guardar($descripcion, $id_categoria, $precio_unitario, $cantidad);
            }
        }
        header('Location: router.php?controller=plato&action=listar');
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            (new Plato())->eliminar(intval($_GET['id']));
        }
        header('Location: router.php?controller=plato&action=listar');
    }
}
