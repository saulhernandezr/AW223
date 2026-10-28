<?php
require_once "consultas.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes | Soporte Tecnico UPQ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <h1>Solicitudes</h1>
        <p>Modulo de solicitudes de soporte</p>
    </header>

    <!-- Navegacion -->
    <nav>
        <a href="index.php">Menu principal</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>

            <h2>Nueva solicitud</h2>

            <form class="validar" action="guardar_solicitud.php" method="POST">

                <div class="campo">
                    <label for="usuario">Solicitante</label>
                    <select id="usuario" name="id_usuario" required>
                        <option value="">Selecciona un usuario</option>
                        <?php
                        $rsUsuarios = listaUsuarios();

                        while ($arrUsuario = mysqli_fetch_array($rsUsuarios)) {
                            echo "<option value='" . $arrUsuario['id_usuario'] . "'>"
                                . htmlspecialchars($arrUsuario['nombre']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="campo">
                    <label for="equipo">Equipo</label>
                    <select id="equipo" name="id_equipo" required>
                        <option value="">Selecciona un equipo</option>
                        <?php
                        $rsEquipos = listaEquipos();

                        while ($arrEquipo = mysqli_fetch_array($rsEquipos)) {
                            echo "<option value='" . $arrEquipo['id_equipo'] . "'>"
                                . htmlspecialchars($arrEquipo['nombre']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="campo">
                    <label for="descripcion">Descripcion del problema</label>
                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Describe el problema" required></textarea>
                </div>

                <button type="submit">Registrar solicitud</button>

            </form>

        </section>

        <section>

            <h2>Solicitudes registradas</h2>

            <div class="tabla">
                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Equipo</th>
                            <th>Problema</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $rsSolicitudes = listaSolicitudes();

                        while ($arrSolicitud = mysqli_fetch_array($rsSolicitudes)) {
                            echo "<tr>
                                <td>" . $arrSolicitud['id_solicitud'] . "</td>
                                <td>" . htmlspecialchars($arrSolicitud['usuario']) . "</td>
                                <td>" . htmlspecialchars($arrSolicitud['equipo']) . "</td>
                                <td>" . htmlspecialchars($arrSolicitud['descripcion']) . "</td>
                                <td><span class='estado " . claseEstado($arrSolicitud['estado']) . "'>"
                                    . $arrSolicitud['estado'] . "</span></td>
                            </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>

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