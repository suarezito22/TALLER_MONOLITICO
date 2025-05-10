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
            // Obtener fechas desde el formulario en formato YYYY-MM-DD
            $fechaInicio = $_POST['fecha_inicio'] . " 00:00:00";
            $fechaFin = $_POST['fecha_fin'] . " 23:59:59";

            // Mostrar fechas para depuración
            echo "Fecha inicio: " . $fechaInicio . "<br>";
            echo "Fecha fin: " . $fechaFin . "<br>";

            $modelo = new Reporte();

            try {
                // Obtener órdenes no anuladas
                $resultado = $modelo->obtenerOrdenesNoAnuladas($fechaInicio, $fechaFin);
                if ($resultado instanceof mysqli_result) {
                    $ordenes = $resultado->fetch_all(MYSQLI_ASSOC);
                    $total = $modelo->obtenerTotal($ordenes);
                }

                // Obtener ranking de platos
                $rankingRes = $modelo->obtenerRankingPlatos($fechaInicio, $fechaFin);
                if ($rankingRes instanceof mysqli_result) {
                    $ranking = $rankingRes->fetch_all(MYSQLI_ASSOC);
                }

            } catch (Exception $e) {
                $ordenes = [];
                $ranking = [];
                $total = 0;
            }

            // Mostrar órdenes para depuración
            echo "<pre>ORDENES RECIBIDAS:\n";
            print_r($ordenes);
            echo "</pre>";
        }

        // Cargar la vista
        require 'view/reporte/general.php';
    }

    public function anuladas() {
        $ordenes = [];
        $fechaInicio = '';
        $fechaFin = '';
        $total = 0;

        if (isset($_POST['fecha_inicio'], $_POST['fecha_fin'])) {
            // Obtener fechas del formulario y agregar hora
            $fechaInicio = $_POST['fecha_inicio'] . " 00:00:00";
            $fechaFin = $_POST['fecha_fin'] . " 23:59:59";

            $modelo = new Reporte();

            try {
                $resultado = $modelo->obtenerOrdenesAnuladas($fechaInicio, $fechaFin);
                if ($resultado instanceof mysqli_result) {
                    $ordenes = $resultado->fetch_all(MYSQLI_ASSOC);
                    $total = $modelo->obtenerTotal($ordenes);
                }
            } catch (Exception $e) {
                $ordenes = [];
                $total = 0;
            }
        }

        // Cargar la vista
        require 'view/reporte/anuladas.php';
    }
}
