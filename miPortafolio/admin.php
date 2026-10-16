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
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
                    
                </thead>
                <tbody>
                    <?php
                    /* conecta con consulta_mensajes.php */
                    require 'consulta_mensajes.php';
                    $mensajes = consultamensajes();
                    while ($arrMensaje=mysqli_fetch_array($mensajes)){
                        
                    echo "<tr>;
                        <td>".$arrMensaje['nombre']."</td>
                        <td>".$arrMensaje['correo']."</td>
                        <td>".$arrMensaje['mensaje']."</td>
                        <td>".$arrMensaje['timestap']."</td>
                        <td>
                            <a href='editar.php?id=".$arrMensaje['id']."'>Editar</a>
                            <a href='borrar.php?id=".$arrMensaje['id']."'>Borrar</a>
                        </td>
                    </tr>";
                    }
                    ?>
                </tbody>
                

            </table>
            
        </section>
    </main>

    <footer>
    </footer>
</body>
</html>