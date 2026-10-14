<?php
$servidor="localhost";
$usuario="";
$password="";
$basedatos="portafolio_db";

/* conectara a la base de datos */
$conexion= new mysqli($servidor, $usuario, $password, $basedatos);

/* prueba si la conexion funciona o deja de funcionar */
if($conexion -> connect_error){
    die("error de conexion".$conexion->connection_error);
}
echo "conexion exitosa";