<?php 
function borrarmensaje(){
    require_once "conexion.php";
    $borrar = 'delete from mensajes where id='.$_GET['id'];
    try{
        $dlMsj = mysqli_query($conexion, $borrar);
        mysqli_close($conexion);
        return $dlMsj;
    } catch(Exception $e){
        die('algo paso al borrar:'.$e->getMesage());
    }
}