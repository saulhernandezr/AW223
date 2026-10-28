<?php

$conexion = new mysqli("localhost", "root", "", "soporte_db");
if ($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");
