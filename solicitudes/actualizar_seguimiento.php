<?php
require_once("conexion.php");

$id = $_POST["id_solicitud"];
$estado = $_POST["estado"];
$observacion = trim($_POST["observacion"]);

if ($estado == "" || $observacion == "") {
    header("Location: atender.php?id=" . $id . "&error=1");
    exit;
}
$sql = "UPDATE solicitudes SET estado = ? WHERE id_solicitud = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $estado, $id);
$stmt->execute();
$stmt->close();

$sql2 = "INSERT INTO seguimiento(id_solicitud, estado, observacion) VALUES (?, ?, ?)";
$stmt2 = $conexion->prepare($sql2);
$stmt2->bind_param("iss", $id, $estado, $observacion);

if ($stmt2->execute()) {
    header("Location: seguimiento.php?estadophp=seguimiento_ok");
} else{
    header("Location: seguimiento.php?estadophp=error");
}

$stmt2->close();
$conexion->close();
exit;
?>
