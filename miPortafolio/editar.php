<?php
$idMensaje = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$nombre = "";
$correo = "";
$mensaje = "";
$error = "";

require_once ("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idMensaje = filter_input(INPUT_POST, "id_mensaje", FILTER_VALIDATE_INT) ?: 0;
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $mensaje = trim($_POST["mensaje"] ?? "");

    if ($idMensaje <= 0) {
        $error = "No se seleccionó un registro válido.";
    } elseif ($nombre === "" || $correo === "" || $mensaje === "") {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "Escribe un correo electrónico válido.";
    } else {
        $stmt = $conexion->prepare(
            "UPDATE mensajes SET nombre = ?, correo = ?, mensaje = ? WHERE id = ?"
        );
        $stmt->bind_param("sssi", $nombre, $correo, $mensaje, $idMensaje);
        $stmt->execute();
        $stmt->close();
        $conexion->close();

        header("Location: index.php?estadophp=actualizado");
        exit;
    }
} else {
    $idMensaje = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT) ?: 0;

    if ($idMensaje > 0) {
        $stmt = $conexion->prepare(
            "SELECT nombre, correo, mensaje FROM mensajes WHERE id = ?"
        );
        $stmt->bind_param("i", $idMensaje);
        $stmt->execute();
        $stmt->bind_result($nombre, $correo, $mensaje);

        if (!$stmt->fetch()) {
            $error = "No se encontró el registro.";
            $idMensaje = 0;
        }

        $stmt->close();
    } else {
        $error = "No se seleccionó un registro válido.";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mensaje</title>
    <link rel="stylesheet" href="./css/estilos.css"> 
</head>
<body>
    <header>
        <h1>Editar mensaje</h1>
        <p>Modifica la información del mensaje seleccionado.</p>
        <nav>
            <a href="index.html" title="portafolio">portafolio</a>

            <br><br>

            <a href="admin.php" title="admin">admin</a>
        </nav>
    </header>

    <main>
        <h2>Formulario para editar</h2>

        <?php if ($idMensaje > 0): ?>
            <p>
                Editando el mensaje número:
                <?php echo htmlspecialchars((string) $idMensaje, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        <?php else: ?>
            <p>No se ha seleccionado un mensaje válido.</p>
        <?php endif; ?>

        <form action="editar.php" method="POST">

            <input
                type="hidden"
                name="id_mensaje"
                value="<?php echo htmlspecialchars((string) $idMensaje, ENT_QUOTES, 'UTF-8'); ?>"
            >

            <p>
                <label for="nombre">Nombre:</label><br>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?>"
                    required
                >
            </p>

            <p>
                <label for="correo">Correo electrónico:</label><br>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    value="<?php echo htmlspecialchars($correo, ENT_QUOTES, 'UTF-8'); ?>"
                    required
                >
            </p>

            <p>
                <label for="mensaje">Mensaje:</label><br>
                <textarea
                    id="mensaje"
                    name="mensaje"
                    rows="6"
                    cols="40"
                    required
                ><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </p>

            <button type="submit">Actualizar mensaje</button>

            <a href="admin.php">Cancelar</a>

        </form>
    </main>

</body>
</html>
