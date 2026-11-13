<?php
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $concepto = $_POST["concepto"];
    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO gastos (concepto, categoria) VALUES ('$concepto', '$categoria')";

    if ($conexion->query($sql) === TRUE) {
        echo "Gasto registrado correctamente.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar el gasto: " . $conexion->error;
    }
}
?>