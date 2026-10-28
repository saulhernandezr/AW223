<?php
require_once "consultas.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos \\ Soporte Tecnico UPQ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <h1>Equipos</h1>
        <p>Catalogo de equipos de computo</p>
    </header>

    <!-- Navegacion -->
    <nav>
        <a href="index.php">Menu principal</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Registrar equipo</h2>
            <form class="validar" action="guardar_equipo.php" method="POST">
                <div class="campo"><label for="nombre">Nombre del equipo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Laptop Dell 01" required></div>
                <div class="campo"><label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Caracteristicas del equipo" required></textarea></div>
                <button type="submit">Guardar equipo</button>
            </form>
        </section>
        <section>
            <h2>Equipos registrados</h2>
            <div class="tabla"><table>
                <thead><tr><th>ID</th><th>Nombre</th><th>Descripcion</th></tr></thead>
                <tbody>
                <?php $rs = listaEquipos(); while ($e = $rs->fetch_assoc()) { ?>
                    <tr><td><?php echo $e['id_equipo']; ?></td>
                        <td><?php echo htmlspecialchars($e['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($e['descripcion']); ?></td></tr>
                <?php } ?>
                </tbody>
            </table></div>
        </section>
        <p class="volver"><a class="boton" href="equipos_usuarios.php">Volver al menu</a></p>
    </main>

    <!-- Pie de pagina -->
    <footer>
        <p>2026 Soporte Tecnico Universitario</p>
        <p>Practica No.8 - Aplicacion web: Repaso</p>
    </footer>

<script src="./js/AlertInsert.js"></script>
<script src="./js/validaciones.js"></script>
</body>
</html>
