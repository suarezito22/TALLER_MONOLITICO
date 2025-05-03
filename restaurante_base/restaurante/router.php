<?php
$controller = $_GET['controller'] ?? 'plato';
$action = $_GET['action'] ?? 'listar';

require_once "controller/" . ucfirst($controller) . "Controller.php";
$obj = new (ucfirst($controller) . "Controller");
$obj->$action();
