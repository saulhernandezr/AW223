<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Tecnico | Soporte Tecnico UPQ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <h1>Soporte Tecnico</h1>
        <p>Sistema web de soporte tecnico universitario</p>
    </header>

    <!-- Navegacion -->
    <nav>
        <a href="index.php">Menu principal</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Pagina principal</h2>
            <div class="tarjetas">
                <a class="tarjeta" href="equipos_usuarios.php">
                    <h3>Equipo / Usuario</h3>
                    <p>Gestion de usuarios y equipos</p></a>
                <a class="tarjeta" href="solicitudes.php">
                    <h3>Solicitud</h3>
                    <p>Crear y consultar solicitudes</p></a>
                <a class="tarjeta" href="seguimiento.php">
                    <h3>Seguimiento</h3>
                    <p>Actualizar el estado de atencion</p></a>
            </div>
        </section>
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
