<?php 
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: admin.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id <= 0) {
    $conexion->close();
    header("Location: index.php?estadophp=error_borrar");
    exit;
}

try {
    $stmt = $conexion->prepare("DELETE FROM mensajes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $eliminado = $stmt->affected_rows > 0;

    $stmt->close();
    $conexion->close();

    if ($eliminado) {
        header("Location: index.php?estadophp=borrado");
    } else {
        header("Location: index.php?estadophp=error_borrar");
    }
    exit;
} catch (mysqli_sql_exception $e) {
    error_log("Error al borrar mensaje: " . $e->getMessage());
    $conexion->close();
    header("Location: index.php?estadophp=error_borrar");
    exit;
}
