<?php
// Funciones de consulta

function listaUsuarios(){
    require "conexion.php";
    $sql = "SELECT * FROM usuarios ORDER BY nombre";
    return mysqli_query($conexion, $sql);
}

function listaEquipos(){
    require "conexion.php";
    $sql = "SELECT * FROM equipos ORDER BY nombre";
    return mysqli_query($conexion, $sql);
}

function listaSolicitudes(){
    require "conexion.php";
    $sql = "SELECT solicitudes.id_solicitud, usuarios.nombre AS usuario, equipos.nombre AS equipo, solicitudes.descripcion, solicitudes.estado
            FROM solicitudes
            INNER JOIN usuarios ON usuarios.id_usuario = solicitudes.id_usuario
            INNER JOIN equipos ON equipos.id_equipo = solicitudes.id_equipo
            ORDER BY solicitudes.id_solicitud DESC";
    return mysqli_query($conexion, $sql);
}

// Devuelve la clase de CSS que le da color a cada estado
function claseEstado($estado){
    if ($estado == "Pendiente") {
        return "pendiente";
    }
    if ($estado == "En proceso") {
        return "en-proceso";
    }
    return "resuelta";
}