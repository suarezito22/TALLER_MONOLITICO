<?php
require_once 'model/Categoria.php';

class CategoriaController {

    public function listar() {
        $modelo = new Categoria();
        $categorias = $modelo->obtenerTodos();
        require 'view/categoria/listar.php';
    }

    public function crear() {
        require 'view/categoria/formulario.php';
    }

    public function guardar() {
        if (isset($_POST['nombre'])) {
            $nombre = trim($_POST['nombre']);
            $modelo = new Categoria();
            $modelo->guardar($nombre);
        }
        header('Location: router.php?controller=categoria&action=listar');
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Categoria();
            $categoria = $modelo->obtenerPorId($id);
            require 'view/categoria/formulario.php';
        }
    }

    public function actualizar() {
        if (isset($_POST['id'], $_POST['nombre'])) {
            $id = intval($_POST['id']);
            $nombre = trim($_POST['nombre']);
            $modelo = new Categoria();
            $modelo->actualizar($id, $nombre);
        }
        header('Location: router.php?controller=categoria&action=listar');
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Categoria();

            if (!$modelo->tienePlatosAsociados($id)) {
                $modelo->eliminar($id);
            } else {
                session_start();
                $_SESSION['mensaje_error'] = "❌ No se puede eliminar la categoría porque tiene platos asociados.";
            }
        }
        header('Location: router.php?controller=categoria&action=listar');
    }
}
