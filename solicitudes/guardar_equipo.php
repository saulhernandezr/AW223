<?php
require_once("conexion.php");

$nombre = trim($_POST["nombre"]);
$descripcion = trim($_POST["descripcion"]);

if ($nombre == "" || $descripcion == "") {
    header("Location: equipos.php?error=1");
    exit;
}

$sql = "INSERT INTO equipos(nombre, descripcion) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $nombre, $descripcion);

if ($stmt->execute()) {
    header("Location: equipos.php?estadophp=equipo_ok");
} else {
    header("Location: equipos.php?estadophp=error");
}

$stmt->close();
$conexion->close();
exit;
?>
