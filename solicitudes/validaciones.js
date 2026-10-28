const formularios = document.querySelectorAll("form.validar");
for (let i = 0; i < formularios.length; i++) {
    formularios[i].addEventListener("submit", validar);
}
function validar(evento) {
    const campos = evento.target.elements;

    for (let i = 0; i < campos.length; i++) {
        if (campos[i].required && campos[i].value.trim() === "") {
            alert("Revisa que todos los campos esten completos");
            evento.preventDefault();
            return;
        }
        if (campos[i].type === "email" && campos[i].value.indexOf("@") === -1) {
            alert("El correo no es valido");
            evento.preventDefault();
            return;
        }
    }
}
