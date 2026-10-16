const parametros=new URLSearchParams(window.location.search)
const estado= parametros.get("estadophp")

/* imprime un alert si es exitoso */
if(estado=== "exito"){
const idMensaje = parametros.get("idmensaje");
alert("MySQL confirmó el registro ");
}else if(estado === "error"){
alert("algo fallo, intentalo nuevamente");
}

/* despliega el mensaje una vez y borra el parametro */
if(estado != null){
    window.history.replaceState({},document.title,window.location.pathname);
}
