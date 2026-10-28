const parametros = new URLSearchParams(window.location.search);
const estado = parametros.get("estadophp");
const error = parametros.get("error");

if (estado === "usuario_ok") {
    alert("Usuario registrado correctamente");
}

if (estado === "equipo_ok") {
    alert("Equipo registrado correctamente");
}

if (estado === "solicitud_ok") {
    alert("Solicitud registrada con estado Pendiente");
}

if (estado === "seguimiento_ok") {
    alert("Solicitud actualizada correctamente");
}

if (estado === "error") {
    alert("Algo fallo, intentalo nuevamente");
}

if (error === "1") {
    alert("Revisa que todos los campos esten completos y sean correctos");
}

if (estado !== null || error !== null) {
    window.history.replaceState({}, document.title, window.location.pathname);
}
