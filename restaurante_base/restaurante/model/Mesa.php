<?php
require_once 'Conexion.php';

class Mesa {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM mesas"; // Cambiado a plural
        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM mesas WHERE id = ?"); // Cambiado a plural
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function guardar($nombre) {
        $stmt = $this->conexion->prepare("INSERT INTO mesas (nombre) VALUES (?)"); // Cambiado a plural
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    public function actualizar($id, $nombre) {
        $stmt = $this->conexion->prepare("UPDATE mesas SET nombre = ? WHERE id = ?"); // Cambiado a plural
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM mesas WHERE id = ?"); // Cambiado a plural
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function tieneOrdenesAsociadas($id) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) as total FROM ordenes WHERE id_mesa = ?"); // Cambiado a 'ordenes'
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'] > 0;
    }
}
