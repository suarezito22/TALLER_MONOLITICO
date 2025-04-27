<?php
class MesaControlador {
    public static function crear($nombre) {
        $mesa = new Mesa();
        return $mesa->crear($nombre);
    }

    public static function editar($id, $nombre) {
        $mesa = new Mesa();
        return $mesa->editar($id, $nombre);
    }

    public static function eliminar($id) {
        $mesa = new Mesa();
        return $mesa->eliminar($id);
    }

    public static function listar() {
        $mesa = new Mesa();
        return $mesa->listar();
    }
}