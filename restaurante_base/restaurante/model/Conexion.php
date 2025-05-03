<?php
class Conexion {
    public static function getConexion() {
        return new mysqli("localhost", "root", "", "restaurante");
    }
}
