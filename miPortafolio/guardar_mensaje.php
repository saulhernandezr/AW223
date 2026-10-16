<?php
require_once("conexion.php");


$nombre = $_POST["txtnombre"];
$correo = $_POST["txtcorreo"];
$mensaje = $_POST["txtmensaje"];

try {
    $sqlInsert = "INSERT INTO mensajes(nombre,correo,mensaje) VALUES(?,?,?)";
    $stmt = $conexion->prepare($sqlInsert);
    $stmt->bind_param("sss", $nombre, $correo, $mensaje);
    $stmt->execute();

    $stmt->close();

    header("Location: index.php?estadophp=exito");
    exit;
} catch (mysqli_sql_exception $e) {
    error_log("Error al guardar mensaje: " . $e->getMessage());
    header("Location: index.php?estadophp=error");
    exit;
}
