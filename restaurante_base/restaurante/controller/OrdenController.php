<?php
require_once 'model/Orden.php';
require_once 'model/Mesa.php';
require_once 'model/Plato.php';

class OrdenController {

    public function listar() {
        $modelo = new Orden();
        $ordenes = $modelo->obtenerTodas();
        require 'view/orden/listar.php';
    }

    public function crear() {
        $mesaModel = new Mesa();
        $platoModel = new Plato();

        $mesas = $mesaModel->obtenerTodos();
        $platos = $platoModel->obtenerTodos();
        require 'view/orden/formulario.php';
    }

    public function guardar() {
        if (isset($_POST['fecha'], $_POST['id_mesa'], $_POST['platos'])) {
            $fecha = $_POST['fecha'];
            $id_mesa = intval($_POST['id_mesa']);
            $detalles = [];
            $total = 0;

            $platoModel = new Plato();
            $errores = [];

            // Verificar stock
            foreach ($_POST['platos'] as $p) {
                $id_plato = intval($p['id']);
                $cantidadSolicitada = intval($p['cantidad']);

                if ($cantidadSolicitada > 0) {
                    $plato = $platoModel->obtenerPorId($id_plato);
                    if ($cantidadSolicitada > $plato['cantidad']) {
                        $errores[] = "No hay suficiente stock de '{$plato['descripcion']}'. Disponibles: {$plato['cantidad']}, solicitados: $cantidadSolicitada.";
                    }
                }
            }

            if (!empty($errores)) {
                session_start();
                $_SESSION['errores'] = $errores;
                header('Location: router.php?controller=orden&action=crear');
                return;
            }

            // Si pasó la validación, construir detalles y registrar
            foreach ($_POST['platos'] as $p) {
                $id_plato = intval($p['id']);
                $cantidad = intval($p['cantidad']);
                $precio = floatval($p['precio']);

                if ($cantidad > 0) {
                    $subtotal = $cantidad * $precio;
                    $total += $subtotal;

                    $detalles[] = [
                        'id_plato' => $id_plato,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $precio
                    ];

                    // Descontar stock
                    $platoModel->descontarCantidad($id_plato, $cantidad);
                }
            }

            if ($total > 0) {
                $modelo = new Orden();
                $modelo->guardar($fecha, $id_mesa, $total, $detalles);
            }
        }

        header('Location: router.php?controller=orden&action=listar');
    }

    public function detalle() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Orden();
            $orden = $modelo->obtenerPorId($id);
            $detalle = $modelo->obtenerDetalle($id);
            require 'view/orden/detalle.php';
        }
    }

    public function anular() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $modelo = new Orden();
            $modelo->anular($id);
        }
        header('Location: router.php?controller=orden&action=listar');
    }
}
?>
