<?php
require_once("conexion.php");
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>control de gestion de gastos personales</h1>
        <p>total gastado: <?php echo $totalGastado; ?></p>
        <p>gastos pendientes: <?php echo $gastosPendientes; ?></p>
    </header>
    <h1>registrar nuevo gasto</h1>
    <form action="registrar_gasto.php" method="POST">
        <p>concepto: 
            <input type="text" name="concepto" required>
        </p>
        <p>categoria:
            <select name="categoria" required>
                <option value="comida">comida<?php
                echo $categoria === 'comida' ? ' selected' : '';
                ?></option>
                <option value="transporte">transporte<?php
                echo $categoria === 'transporte' ? ' selected' : '';
                ?></option>
                <option value="servicios">servicios<?php
                echo $categoria === 'servicios' ? ' selected' : '';
                ?></option>
            </select>
        </p>
        <button type="submit" method="POST" href="index.php">registrar gasto
            
        </button>
        
    </form>

    <p>This is a simple paragraph.</p>
    >
</body>

</html>