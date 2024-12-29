
const mostrarContenidoCita=document.querySelector(".mostrarContenidoCita");
const mostrarFactura=document.querySelector(".mostrarFactura");
// parametros para mostrar contenido 
const urlParams = new URLSearchParams(window.location.search);
const idCita = urlParams.get('idcita');
const fechaCita = urlParams.get('fecha_cita');
const tipoServicio = urlParams.get('tipo_servicio');
const descripcion = urlParams.get('descripcion');

mostrarContenidoCita.innerHTML = `
<div class="container mt-2 mb-5">
    <h3 class="text-center mb-4 text-secondary">Detalle de Cita</h3>

    <!-- Tarjeta principal -->
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Detalles de la Cita</h4>
        </div>
        <div class="card-body bg-light p-4">

            <!-- ID Cita -->
            <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                <span class="label text-secondary font-weight-bold">ID Cita:</span>
                <span class="value text-dark">${idCita}</span>
            </div>

            <!-- Fecha de Cita -->
            <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                <span class="label text-secondary font-weight-bold">Fecha de Cita:</span>
                <span class="value text-dark">${fechaCita}</span>
            </div>

            <!-- Tipo de Servicio -->
            <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                <span class="label text-secondary font-weight-bold">Tipo de Servicio:</span>
                <span class="value text-dark">${tipoServicio}</span>
            </div>

            <!-- Descripción -->
            <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                <span class="label text-secondary font-weight-bold">Descripción:</span>
                <span class="value text-dark">${descripcion}</span>
            </div>

        </div>
    </div>
</div>`


//parte de la factura


$.ajax({
    url: "../controllers/UsuariosFacturaController.php", 
    type: "GET", 
    data:{
        idCita:idCita,
    },
    success: function(response) {
        if (response) {
            let datos = JSON.parse(response); 
    
            mostrarFactura.innerHTML = ''; 
    
            datos.forEach(dato => {
                mostrarFactura.innerHTML += `
                    <div class="container mt-5 mb-5">
                        <h3 class="text-center mb-4 text-secondary">Detalle de Factura</h3>
    
                        <!-- Tarjeta principal -->
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0">Detalles de Su Factura</h4>
                            </div>
                            <div class="card-body bg-light p-4">
                                <!-- ID Factura -->
                                <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                                    <span class="label text-secondary font-weight-bold">ID Factura:</span>
                                    <span class="value text-dark">${dato.id}</span>
                                </div>
    
                                <!-- Total -->
                                <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                                    <span class="label text-secondary font-weight-bold">Total:</span>
                                    <span class="value text-dark">${dato.total}</span>
                                </div>
    
                                <!-- Fecha de emisión -->
                                <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                                    <span class="label text-secondary font-weight-bold">Fecha de Emisión:</span>
                                    <span class="value text-dark">${dato.fecha_emision}</span>
                                </div>
    
                                <!-- Número de tarjeta -->
                                <div class="info-box mb-3 p-3 border-bottom d-flex justify-content-between">
                                    <span class="label text-secondary font-weight-bold">Número de Tarjeta:</span>
                                    <span class="value text-dark">${dato.numero_tarjeta}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        } else {
            alert("Error al obtener los datos de la factura.");
        }    
    },
    error: function(error) {
        console.log("Error en la solicitud AJAX:", error);
    }
});