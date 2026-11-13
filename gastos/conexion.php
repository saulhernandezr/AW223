<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$database = "gastos_db";

$conexion = new mysqli($servidor, $usuario, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}else {
    $conexion->set_charset("utf8");
}
?>