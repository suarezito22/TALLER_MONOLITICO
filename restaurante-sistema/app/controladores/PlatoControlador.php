<?php
class PlatoControlador {
    public static function crear($descripcion, $categoria_id, $precio_unitario) {
        $plato = new Plato();
        return $plato->crear($descripcion, $categoria_id, $precio_unitario);
    }

    public static function editar($id, $descripcion, $categoria_id, $precio_unitario) {
        $plato = new Plato();
        return $plato->editar($id, $descripcion, $categoria_id, $precio_unitario);
    }

    public static function eliminar($id) {
        $plato = new Plato();
        return $plato->eliminar($id);
    }

    public static function listar() {
        $plato = new Plato();
        return $plato->listar();
    }

    public static function obtenerPorId($id) {
        $plato = new Plato();
        return $plato->obtenerPorId($id);
    }

    public static function listarCategorias() {
        $categoria = new Categoria();
        return $categoria->listar();
    }
}