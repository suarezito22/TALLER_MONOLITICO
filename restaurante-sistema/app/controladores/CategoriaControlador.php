<?php
class CategoriaControlador {
    class CategoriaControlador {

        public static function crear($nombre) {
            $categoria = new Categoria();
            return $categoria->crear($nombre);
        }
    
        public static function editar($id, $nombre) {
            $categoria = new Categoria();
            return $categoria->editar($id, $nombre);
        }
    
        public static function eliminar($id) {
            $categoria = new Categoria();
            return $categoria->eliminar($id);
        }
    
        public static function listar() {
            $categoria = new Categoria();
            return $categoria->listar();
        }
}
}