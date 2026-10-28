<?php
require_once("conexion.php");

$id_usuario = $_POST["id_usuario"];
$id_equipo = $_POST["id_equipo"];
$descripcion = trim($_POST["descripcion"]);

if ($id_usuario == "" || $id_equipo == "" || $descripcion == "") {
    header("Location: solicitudes.php?error=1");
    exit;
}
$sql = "INSERT INTO solicitudes(id_usuario, id_equipo, descripcion, estado) VALUES (?, ?, ?, 'Pendiente')";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("iis", $id_usuario, $id_equipo, $descripcion);

if ($stmt->execute()) {
    header("Location: solicitudes.php?estadophp=solicitud_ok");
} else {
    header("Location: solicitudes.php?estadophp=error");
}

$stmt->close();
$conexion->close();
exit;
?>
