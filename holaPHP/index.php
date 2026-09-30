<!-- estructura y codigo php -->
<?php
    /* las variables usan signos de peso */
    $nombre="Saul Hernandez";
    $materia="programacion web";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi primer pagina PHP</title>
</head>

<body>
    
    <!-- imprime el nombre y materia del php -->
    <h1>hola, <?php echo $nombre; ?></h1>
    <h4>bienvenido a <?php echo $materia; ?> </h4>
</body>
</html>