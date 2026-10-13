<?php
    $nombre="Saul Hernandez";
    $correo="saulh@saul.com";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administración - Mensajes Recibidos</title>

    <link rel="stylesheet" href="./css/estilos.css"> 
</head>

<body>
    <header>
        <h1>Zona Administracion</h1>
        <p>Mensajes Recibidos</p>
    </header>

    <nav aria-label="Navegación principal">
        <a href="index.html" aria-label="Inicio">⌂</a>
    </nav>

    <main>
        <section aria-labelledby="titulo-mensajes">
            <h2 id="titulo-mensajes">Mensajes Recibidos</h2>

            <table>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $correo; ?>/td>
                        <td>Hola, me interesa tu portafolio.</td>
                        <td>
                            <a href="editar.php?id=1" aria-label="Editar mensaje 1">editar</a>
                            <a href="" aria-label="Eliminar mensaje 1">borrar</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $correo; ?></td>
                        <td>Quisiera más información sobre tus proyectos.</td>
                        <td>
                            <a href="editar.php?id=2" aria-label="Editar mensaje 2">editar</a>
                            <a href="" aria-label="Eliminar mensaje 2">borrar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
    </footer>
</body>
</html>