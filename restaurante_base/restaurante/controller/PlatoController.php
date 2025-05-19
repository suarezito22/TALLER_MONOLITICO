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
        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->obtenerTodos();
        require 'view/plato/formulario.php';
    }

    public function guardar() {
        if (isset($_POST['descripcion'], $_POST['id_categoria'], $_POST['cantidad'], $_POST['precio_unitario'])) {
            $descripcion = trim($_POST['descripcion']);
            $categoria_id = intval($_POST['id_categoria']);
            $cantidad = intval($_POST['cantidad']);
            $precio = floatval($_POST['precio_unitario']);

            $modelo = new Plato();
            $modelo->guardar($descripcion, $categoria_id, $precio, $cantidad);
        }
        header('Location: router.php?controller=plato&action=listar');
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Plato();
            $plato = $modelo->obtenerPorId($id);
            require 'view/plato/formulario.php';
        }
    }

    public function actualizar() {
        if (isset($_POST['id'], $_POST['descripcion'], $_POST['precio_unitario'])) {
            $id = intval($_POST['id']);
            $descripcion = trim($_POST['descripcion']);
            $precio = floatval($_POST['precio_unitario']);

            $modelo = new Plato();
            $modelo->actualizar($id, $descripcion, $precio);
        }
        header('Location: router.php?controller=plato&action=listar');
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Plato();

            if (!$modelo->tieneOrdenesAsociadas($id)) {
                $modelo->eliminar($id);
            }
        }
        header('Location: router.php?controller=plato&action=listar');
    }
}
