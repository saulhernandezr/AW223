/* id de botones de bienvenida, cambian el texto */
const boton = document.getElementById("botonBienvenida");
const bienvenida = document.getElementById("bienvenida");
/* id botones color y tipografia */
const botonColor = document.getElementById("cambiarColor");
const botonFuente = document.getElementById("cambiarFuente");
const habilidades = document.querySelectorAll(".lista-habilidades li");
/* id del formulario para el contacto */
const formulario = document.getElementById("formularioContacto");
const nombre = document.getElementById("nombre"); 
const email = document.getElementById("email");
const mensajeFormulario = document.getElementById("mensajeFormulario");
/* al interactuar con un click en la interfaz se cambia al texto dentro
del codigo */
boton.addEventListener("click", function() {
    bienvenida.textContent = "hola, bienvenido a mi portafolio con js";
});

/* cambia el color y tipografia de habilidades */
botonColor.addEventListener("click", function() {
    habilidades.forEach(function(habilidad) {
        habilidad.style.backgroundColor = "orange";
    });
});
botonFuente.addEventListener("click", function() {

    habilidades.forEach(function(habilidad) {
        habilidad.style.fontFamily = "Courier New";
    });
});

/* evento que ocurrira al presionar enviar */
formulario.addEventListener("submit", function(event) {
    event.preventDefault();
    /* se valida si esta vacio el nombre, email. al final muestra si se envia correctamente*/
    if (nombre.value.trim() === "") {
        alert("Por favor, escribe tu nombre.");
        return;
    }
if (email.value.trim() === "") {
        alert("El correo es obligatorio");
        return;
    }
alert("Los datos del formulario fueron enviados correctamente.");
formulario.reset();
});
