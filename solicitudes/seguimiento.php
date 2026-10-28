<?php
require_once "consultas.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento | Soporte Tecnico UPQ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <h1>Seguimiento</h1>
        <p>Modulo de seguimiento de solicitudes</p>
    </header>

    <!-- Navegacion -->
    <nav>
        <a href="index.php">Menu principal</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Solicitudes registradas</h2>
            <div class="tabla"><table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Equipo</th>
                        <th>Problema</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr></thead>
                <tbody>
                <?php $rs = listaSolicitudes(); 
                while ($s = $rs->fetch_assoc()) { ?>
                
                    <tr><td><?php echo $s['id_solicitud']; ?></td>
                        <td><?php echo htmlspecialchars($s['usuario']); ?></td>
                        <td><?php echo htmlspecialchars($s['equipo']); ?></td>
                        <td><?php echo htmlspecialchars($s['descripcion']); ?></td>
                        <td><span class="estado <?php echo claseEstado($s['estado']); ?>"><?php echo $s['estado']; ?></span></td>
                        <td><a class="boton" href="atender.php?id=<?php echo $s['id_solicitud']; ?>">Atender</a></td></tr>
                <?php } ?>
                </tbody>
            </table></div>
        </section>
        <p class="volver"><a class="boton" href="index.php">Volver al menu</a></p>
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
