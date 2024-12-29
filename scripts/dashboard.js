import { getCookie,deleteCookie} from "./cookies.js";

let fecha=getCookie("fecha");
let tipoServicio= getCookie("tipoServicio");
let descripcion=getCookie("descripcion");
let estado_cita= "Pendiente";
let hora= getCookie("hora");


const dialog = document.querySelector(".dialog");
const dialogBotonCerrar = document.querySelector(".cancelar");
const dialogBotonConfirmar = document.querySelector(".confirmar");

//controlador del modal porner un null 
if (getCookie("fecha") !== null) {
    console.log("No estoy vacío");
    dialog.classList.remove("d-none");
}

// event listeners
dialogBotonCerrar.addEventListener("click", () => {
    dialog.classList.add("d-none");
    console.log("Cita cancelada");
    deleteCookie(fecha);
    deleteCookie(hora);
    deleteCookie(nombedelServicio);
    deleteCookie(tipoServicio);
    deleteCookie(correo);
});

dialogBotonConfirmar.addEventListener("click", () => {

    console.log(
        fecha,
        tipoServicio,
        descripcion,
        estado_cita,
        hora
    );
    
    $.ajax({
        url: '../controllers/UsuariosCitasController.php',
        type: 'POST',
        data: { 
            fecha_cita: fecha,
            tipoServicio: tipoServicio,
            descripcion: descripcion,
            estado_cita: estado_cita,
            hora: hora,
        },
        dataType: 'json',
        success: function (respuesta) {
            window.location.href="./dashboardusuario-gestion_cita.php";
        },

        error: function (xhr, status, error) {
            console.error("Error de AJAX:", error);
            alert("Error en la solicitud AJAX: " + error);
        }
    });
});


