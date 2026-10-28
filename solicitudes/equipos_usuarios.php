<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo / Usuario | Soporte Tecnico UPQ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <h1>Equipo / Usuario</h1>
        <p>Selecciona una opcion</p>
    </header>

    <!-- Navegacion -->
    <nav>
        <a href="index.php">Menu principal</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Menu de gestion</h2>
            <div class="tarjetas">
                <a class="tarjeta" href="usuarios.php">
                    <h3>Gestion de usuarios</h3>
                    <p>Registrar y consultar usuarios</p></a>
                <a class="tarjeta" href="equipos.php">
                    <h3>Gestion de equipos</h3>
                    <p>Registrar y consultar equipos</p></a>
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
