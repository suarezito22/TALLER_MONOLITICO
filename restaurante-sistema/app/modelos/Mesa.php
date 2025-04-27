<?php
class Mesa {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function crear($nombre) {
        $sql = "INSERT INTO mesas (nombre) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre]);
    }

    public function editar($id, $nombre) {
        $sql = "UPDATE mesas SET nombre = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM mesas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function listar() {
        $sql = "SELECT * FROM mesas";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}