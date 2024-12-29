
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

    let fecha = document.getElementById('fecha').value;
    let hora = document.getElementById('appt').value;
    let tipoServicio;
    let descripcion;
    let estado_cita= "Pendiente";


    if (document.querySelector('input[name="flexRadioDefault"]:checked').value ==="mantenimiento") {
        tipoServicio = "servicios_mantenimiento";
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

    ////hacer el ajax para crear cita nueva
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
            alert("Cita creada exitosamente");
            setTimeout(() => {
                window.location.href = "./dashboardusuario-gestion_cita.php";
            }, 500);
            
        },

        error: function (xhr, status, error) {
            console.error("Error de AJAX:", error);
            alert("Error en la solicitud AJAX: " + error);
        }
    });
    

});

// ---------------------------------------------------------------------

// aqui es la parte 2