<?php

function consultamensajes(){
    require_once "conexion.php";

    $selection ="select * from mensajes";
    try{
        $rsMsj = mysqli_query($conexion, $selection);
        mysqli_close($conexion);
        return $rsMsj;
    } catch(Exception $e){
        die('algo paso al consultar:'.$e->getMesage());
    }
}