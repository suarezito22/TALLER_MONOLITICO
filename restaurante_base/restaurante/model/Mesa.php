<?php
require_once 'Conexion.php';

class Mesa {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM mesa";
        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM mesa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function guardar($nombre) {
        $stmt = $this->conexion->prepare("INSERT INTO mesa (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    public function actualizar($id, $nombre) {
        $stmt = $this->conexion->prepare("UPDATE mesa SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM mesa WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function tieneOrdenesAsociadas($id) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) as total FROM orden WHERE id_mesa = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'] > 0;
    }
}
