<?php
require_once 'model/Mesa.php';

class MesaController {

    public function listar() {
        $modelo = new Mesa();
        $mesas = $modelo->obtenerTodos();
        require 'view/mesa/listar.php';
    }

    public function crear() {
        $mesa = null;
        require 'view/mesa/formulario.php';
    }

    public function guardar() {
        if (isset($_POST['nombre'])) {
            $nombre = trim($_POST['nombre']);

            if ($nombre !== "") {
                $modelo = new Mesa();
                $modelo->guardar($nombre);
            }
        }
        header('Location: router.php?controller=mesa&action=listar');
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Mesa();
            $mesa = $modelo->obtenerPorId($id);
            require 'view/mesa/formulario.php';
        }
    }

    public function actualizar() {
        if (isset($_POST['id'], $_POST['nombre'])) {
            $id = intval($_POST['id']);
            $nombre = trim($_POST['nombre']);

            if ($nombre !== "") {
                $modelo = new Mesa();
                $modelo->actualizar($id, $nombre);
            }
        }
        header('Location: router.php?controller=mesa&action=listar');
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Mesa();

            if (!$modelo->tieneOrdenesAsociadas($id)) {
                $modelo->eliminar($id);
            }
        }
        header('Location: router.php?controller=mesa&action=listar');
    }
}
