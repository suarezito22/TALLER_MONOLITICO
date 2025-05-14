<?php
require_once 'Conexion.php';

class Plato {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function guardar($descripcion, $categoria_id, $precio, $cantidad) {
        $stmt = $this->conexion->prepare("INSERT INTO plato (descripcion, id_categoria, precio_unitario, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sidi", $descripcion, $categoria_id, $precio, $cantidad);
        return $stmt->execute();
    }

    public function obtenerTodos() {
        $sql = "SELECT p.*, c.nombre AS categoria FROM plato p JOIN categoria c ON p.id_categoria = c.id";
        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM plato WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $descripcion, $precio) {
        $stmt = $this->conexion->prepare("UPDATE plato SET descripcion = ?, precio_unitario = ? WHERE id = ?");
        $stmt->bind_param("sdi", $descripcion, $precio, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM plato WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function descontarCantidad($id, $cantidad) {
        $stmt = $this->conexion->prepare("UPDATE plato SET cantidad = cantidad - ? WHERE id = ?");
        $stmt->bind_param("ii", $cantidad, $id);
        return $stmt->execute();
    }

    public function tieneOrdenesAsociadas($id) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) AS total FROM detalle_orden WHERE id_plato = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'] > 0;
    }
}
