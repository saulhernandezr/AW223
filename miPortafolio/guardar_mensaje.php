<?php
require_once("conexion.php");
$nombre= $_POST("txtnombre");
$correo= $_POST("txtcorreo");
$mensaje= $_POST("txtmensaje");

/* preparando la sentencia */
$sqlinsert="INSERT INTO mensajes(nombre,correo,mensaje)
        VALUES(?,?,?)";

/* preparar statement */
$stmt=$conexion->prepare($sqlInsert);
$stmt->bin_param("sss",$nombre,$correo,$mensaje);

/* ejecucion */
if($stmt->execute()){
    echo "mensaje guardado";
}else{
    echo "error al guardar";
}