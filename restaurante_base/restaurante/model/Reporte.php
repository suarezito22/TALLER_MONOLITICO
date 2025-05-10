<?php
require_once 'Conexion.php';

class Reporte {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    // Obtener órdenes no anuladas
    public function obtenerOrdenesNoAnuladas($fechaInicio, $fechaFin) {
        $stmt = $this->conexion->prepare("
            SELECT o.*, m.nombre AS mesa
            FROM ordenes o
            JOIN mesas m ON o.id_mesa = m.id
            WHERE o.anulada = 0 AND o.fecha BETWEEN ? AND ?
            ORDER BY o.fecha ASC
        ");
        $stmt->bind_param("ss", $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Obtener órdenes anuladas
    public function obtenerOrdenesAnuladas($fechaInicio, $fechaFin) {
        $stmt = $this->conexion->prepare("
            SELECT o.*, m.nombre AS mesa
            FROM ordenes o
            JOIN mesas m ON o.id_mesa = m.id
            WHERE o.anulada = 1 AND o.fecha BETWEEN ? AND ?
            ORDER BY o.fecha ASC
        ");
        $stmt->bind_param("ss", $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Obtener ranking de platos
    public function obtenerRankingPlatos($fechaInicio, $fechaFin) {
        $stmt = $this->conexion->prepare("
            SELECT p.descripcion, SUM(do.cantidad) AS total_vendidos
            FROM detalle_orden do
            JOIN platos p ON do.id_plato = p.id
            JOIN ordenes o ON do.id_orden = o.id
            WHERE o.anulada = 0 AND o.fecha BETWEEN ? AND ?
            GROUP BY p.id
            ORDER BY total_vendidos DESC
        ");
        $stmt->bind_param("ss", $fechaInicio, $fechaFin);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Obtener total de órdenes
    public function obtenerTotal($ordenes) {
        $total = 0;
        foreach ($ordenes as $o) {
            $total += $o['total'];
        }
        return $total;
    }
}
