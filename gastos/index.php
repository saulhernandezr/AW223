<?php
require_once("conexion.php");
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$listadegastos = "SELECT * FROM gastos";

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

    <h2>listado de gastos</h2>
    <table>
        <tr>
            <th>concepto</th>
            <th>monto</th>
            <th>categoria</th>
            <th>estado</th>
            <th>fecha</th>
            <th>acciones</th>

        </tr>
        <?php
        $result = $conexion->query($listadegastos);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["concepto"] . "</td>";
                echo "<td>" . $row["monto"] . "</td>";
                echo "<td>" . $row["categoria"] . "</td>";
                echo "<td> pendiente </td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td>" . "<a href='' >marcar pagado</a>" . "</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay gastos registrados.</td></tr>";
        }
        ?>
    </table>
</body>

</html>
        

    
    
</body>

</html>