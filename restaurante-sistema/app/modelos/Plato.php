<?php
class Plato {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function crear($descripcion, $categoria_id, $precio_unitario) {
        $sql = "INSERT INTO platos (descripcion, categoria_id, precio_unitario) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$descripcion, $categoria_id, $precio_unitario]);
    }

    public function editar($id, $descripcion, $categoria_id, $precio_unitario) {
        $sql = "UPDATE platos SET descripcion = ?, categoria_id = ?, precio_unitario = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$descripcion, $categoria_id, $precio_unitario, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM platos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function listar() {
        $sql = "SELECT platos.*, categorias.nombre as categoria_nombre
                FROM platos
                INNER JOIN categorias ON platos.categoria_id = categorias.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM platos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}