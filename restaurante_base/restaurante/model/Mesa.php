<?php
require_once 'Conexion.php';

class Mesa {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    // Obtener todas las mesas
    public function obtenerTodos() {
        $sql = "SELECT * FROM mesa";
        return $this->conexion->query($sql);
    }

    // Obtener una mesa por su ID
    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM mesa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Registrar nueva mesa
    public function guardar($nombre) {
        $stmt = $this->conexion->prepare("INSERT INTO mesa (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    // Actualizar nombre de la mesa
    public function actualizar($id, $nombre) {
        $stmt = $this->conexion->prepare("UPDATE mesa SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    // Eliminar una mesa
    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM mesa WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Validar si tiene órdenes asociadas
    public function tieneOrdenesAsociadas($id) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) as total FROM orden WHERE id_mesa = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'] > 0;
    }
}
