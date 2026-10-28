<?php
require_once("conexion.php");

$nombre = trim($_POST["nombre"]);
$correo = trim($_POST["correo"]);

if ($nombre == "" || $correo == "" || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: usuarios.php?error=1");
    exit;
}

$sql = "INSERT INTO usuarios(nombre, correo) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $nombre, $correo);

if ($stmt->execute()) {
    header("Location: usuarios.php?estadophp=usuario_ok");
} else {
    header("Location: usuarios.php?estadophp=error");
}

$stmt->close();
$conexion->close();
exit;
?>
