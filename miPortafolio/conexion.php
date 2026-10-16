<?php
$servidor="localhost";
$usuario="root";
$password="";
$basedatos="portafolio_db";

/* conectara a la base de datos */
$conexion= new mysqli($servidor, $usuario, $password, $basedatos);

/* prueba si la conexion funciona o deja de funcionar */
if($conexion -> connect_error){
    die("error de conexion".$conexion->connect_error);
}
echo "conexion exitosa";
