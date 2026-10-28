<?php
require_once("conexion.php");

$id = $_GET["id"];

$sql = "SELECT solicitudes.*, usuarios.nombre AS usuario, equipos.nombre AS equipo
        FROM solicitudes
        INNER JOIN usuarios ON usuarios.id_usuario = solicitudes.id_usuario
        INNER JOIN equipos ON equipos.id_equipo = solicitudes.id_equipo
        WHERE solicitudes.id_solicitud = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    header("Location: seguimiento.php");
    exit;
}

$solicitud = $resultado->fetch_assoc();
$stmt->close();

$sql2 = "SELECT * FROM seguimiento WHERE id_solicitud = ? ORDER BY id_seguimiento DESC";
$stmt2 = $conexion->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$historial = $stmt2->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atender solicitud | Soporte Tecnico UPQ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <h1>Atender solicitud</h1>
        <p>Actualizar el estado de la solicitud seleccionada</p>
    </header>

    <!-- Navegacion -->
    <nav>
        <a href="index.php">Menu principal</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>

            <h2>Datos de la solicitud</h2>

            <p class="detalle">
                <strong>Usuario:</strong> <?php echo htmlspecialchars($solicitud['usuario']); ?><br>
                <strong>Equipo:</strong> <?php echo htmlspecialchars($solicitud['equipo']); ?><br>
                <strong>Problema:</strong> <?php echo htmlspecialchars($solicitud['descripcion']); ?><br>
                <strong>Estado actual:</strong> <?php echo htmlspecialchars($solicitud['estado']); ?>
            </p>

            <form class="validar" action="actualizar_seguimiento.php" method="POST">

                <input type="hidden" name="id_solicitud" value="<?php echo $solicitud['id_solicitud']; ?>">

                <div class="campo">
                    <label for="estado">Nuevo estado</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecciona un estado</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelta">Resuelta</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="observacion">Observacion de la atencion</label>
                    <textarea id="observacion" name="observacion" rows="4" required></textarea>
                </div>

                <button type="submit">Guardar cambios</button>

            </form>

        </section>

        <section>

            <h2>Historial de atencion</h2>

            <div class="tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Observacion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($historial)) {
                            echo "<tr>
                                <td>" . htmlspecialchars($fila['fecha_act']) . "</td>
                                <td>" . htmlspecialchars($fila['estado']) . "</td>
                                <td>" . htmlspecialchars($fila['observacion']) . "</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </section>

        <p class="volver"><a class="boton" href="seguimiento.php">Volver al menu</a></p>
    </main>

    <!-- Pie de pagina -->
    <footer>
        <p>&copy; 2026 Soporte Tecnico Universitario</p>
        <p>Practica No.8 - Aplicacion web: Repaso</p>
    </footer>

<script src="./js/AlertInsert.js"></script>
<script src="./js/validaciones.js"></script>
</body>
</html>