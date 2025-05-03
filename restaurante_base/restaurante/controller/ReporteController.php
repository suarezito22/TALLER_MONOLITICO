<?php
require_once 'model/Reporte.php';

class ReporteController {

    public function general() {
        $ordenes = [];
        $ranking = [];
        $fechaInicio = '';
        $fechaFin = '';
        $total = 0;

        if (isset($_POST['fecha_inicio'], $_POST['fecha_fin'])) {
            $fechaInicio = $_POST['fecha_inicio'];
            $fechaFin = $_POST['fecha_fin'];

            $modelo = new Reporte();
            $resultado = $modelo->obtenerOrdenesNoAnuladas($fechaInicio, $fechaFin);
            $ordenes = $resultado->fetch_all(MYSQLI_ASSOC);
            $ranking = $modelo->obtenerRankingPlatos($fechaInicio, $fechaFin)->fetch_all(MYSQLI_ASSOC);
            $total = $modelo->obtenerTotal($ordenes);
        }

        require 'view/reporte/general.php';
    }

    public function anuladas() {
        $ordenes = [];
        $fechaInicio = '';
        $fechaFin = '';
        $total = 0;

        if (isset($_POST['fecha_inicio'], $_POST['fecha_fin'])) {
            $fechaInicio = $_POST['fecha_inicio'];
            $fechaFin = $_POST['fecha_fin'];

            $modelo = new Reporte();
            $resultado = $modelo->obtenerOrdenesAnuladas($fechaInicio, $fechaFin);
            $ordenes = $resultado->fetch_all(MYSQLI_ASSOC);
            $total = $modelo->obtenerTotal($ordenes);
        }

        require 'view/reporte/anuladas.php';
    }
}
