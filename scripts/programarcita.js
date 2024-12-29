import { setCookie, getCookie,deleteCookie } from "./cookies.js";

const radios = document.querySelectorAll('input[name="flexRadioDefault"]');
const mantenimientoDiv = document.getElementById('mantenimiento');
const reparacionDiv = document.getElementById('reparacion');
const descripcionElement = document.querySelector('.descripcion');
const precioElement = document.querySelector('.precio');
const agendarform=document.querySelector(".agendarform");

function actualizarDescripcionYPrecio(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const descripcion = selectedOption.getAttribute('data-descripcion');
    const precio = selectedOption.getAttribute('data-precio');
    
    descripcionElement.textContent = `Descripción: ${descripcion}`;
    precioElement.textContent = `Precio: LPS.${precio}`;

}

radios.forEach(radio => {
    radio.addEventListener('change', () => {
        document.getElementById('servicioMantenimiento').selectedIndex = 0;
        document.getElementById('servicioReparacion').selectedIndex = 0;
        if (radio.value === 'mantenimiento') {
            mantenimientoDiv.classList.remove('d-none');
            reparacionDiv.classList.add('d-none');
            descripcionElement.textContent = ``;
            precioElement.textContent = ``;
            
        } else if (radio.value === 'reparacion') {
            reparacionDiv.classList.remove('d-none');
            mantenimientoDiv.classList.add('d-none');
            descripcionElement.textContent = ``;
            precioElement.textContent = ``;
        }
    });
});

document.getElementById('servicioMantenimiento').addEventListener('change', function(e) {
    actualizarDescripcionYPrecio(e.currentTarget);
});

document.getElementById('servicioReparacion').addEventListener('change', function(e) {
    actualizarDescripcionYPrecio(e.currentTarget);
});


// Logica del boton y formulario 
agendarform.addEventListener("submit", (e) => {
    e.preventDefault();
    
    let correoUsername = document.getElementById('inputEmail3').value;
    let fecha = document.getElementById('fecha').value;
    let hora = document.getElementById('appt').value;
    let tipoServicio;
    let descripcion;


    if (document.querySelector('input[name="flexRadioDefault"]:checked').value ==="mantenimiento") {
        tipoServicio = "servicios_mantenimie9nto";
        descripcion = document.getElementById('servicioMantenimiento').value;

        if (!descripcion) {
            alert("Por favor, selecciona un servicio de mantenimiento.");
            return;
        }

    } else if (document.querySelector('input[name="flexRadioDefault"]:checked').value === "reparacion") {
        tipoServicio = "reparacion_vehiculos";
        descripcion = document.getElementById('servicioReparacion').value;

        if (!descripcion) {
            alert("Por favor, selecciona un servicio de reparación.");
            return;
        }
    } else {
        tipoServicio = null;
        descripcion = null;
        alert(`Error vuelve a intentar`);
    }

    // Guardar las cookies
    setCookie("correoUsername", correoUsername, 30);
    setCookie("fecha", fecha, 30);
    setCookie("hora", hora, 30);
    setCookie("tipoServicio", tipoServicio, 30);
    setCookie("descripcion", descripcion, 30);
    
    window.location.href="./login.php"


});

// ---------------------------------------------------------------------

// aqui es la parte 2