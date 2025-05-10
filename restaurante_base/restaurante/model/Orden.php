<?php
require_once 'Conexion.php';

class Orden {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function guardar($fecha, $id_mesa, $total, $detalles) {
        $this->conexion->begin_transaction();

        try {
            $stmt = $this->conexion->prepare("INSERT INTO ordenes (fecha, id_mesa, total) VALUES (?, ?, ?)");
            $stmt->bind_param("sid", $fecha, $id_mesa, $total);
            $stmt->execute();
            $id_orden = $stmt->insert_id;

            $stmtDetalle = $this->conexion->prepare("INSERT INTO detalle_orden (id_orden, id_plato, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");

            foreach ($detalles as $detalle) {
                $stmtDetalle->bind_param("iiid", $id_orden, $detalle['id_plato'], $detalle['cantidad'], $detalle['precio_unitario']);
                $stmtDetalle->execute();
            }

            $this->conexion->commit();
            return true;
        } catch (Exception $e) {
            $this->conexion->rollback();
            return false;
        }
    }

    public function obtenerTodasConTotales() {
    $sql = "
        SELECT o.id, o.fecha, o.anulada, m.nombre AS mesa,
               IFNULL(SUM(d.cantidad * d.precio_unitario), 0) AS total
        FROM ordenes o
        JOIN mesas m ON o.id_mesa = m.id
        LEFT JOIN detalle_orden d ON o.id = d.id_orden
        GROUP BY o.id
        ORDER BY o.fecha DESC
    ";
    return $this->conexion->query($sql);
}


    public function obtenerPorId($id) {
    $stmt = $this->conexion->prepare("
        SELECT o.*, m.nombre AS mesa
        FROM ordenes o
        JOIN mesas m ON o.id_mesa = m.id
        WHERE o.id = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


    public function obtenerDetalle($id_orden) {
        $stmt = $this->conexion->prepare("
            SELECT do.*, p.descripcion 
            FROM detalle_orden do 
            JOIN platos p ON do.id_plato = p.id 
            WHERE do.id_orden = ?");
        $stmt->bind_param("i", $id_orden);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function anular($id) {
        $stmt = $this->conexion->prepare("UPDATE ordenes SET anulada = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
