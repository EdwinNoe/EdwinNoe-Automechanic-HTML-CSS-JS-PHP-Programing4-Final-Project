const contenedorTarjetas=document.querySelector(".contenedor-tarjetas");
const agregarTarjeta=document.querySelector(".agregarTarjeta");
const btnPagar=document.querySelector(".btnPagar");


let Tarjeta;
let NumeroTarjeta;


const urlParams = new URLSearchParams(window.location.search);
const idCita = urlParams.get('idcita');
const fechaCita = urlParams.get('fecha_cita');
const tipoServicio = urlParams.get('tipo_servicio');
const descripcion = urlParams.get('descripcion');
let precio;

//cargar las tarjetas
document.addEventListener("DOMContentLoaded", ()=>{

    //monto a pagar . 
    $.ajax({
        url: "../controllers/ReparacionMantemientoController.php",
        type: 'GET',
        data: {servicio:tipoServicio},
        success: function (response) {
            const data=JSON.parse(response);
            console.log(data);
            for(let i= 0 ; i < data.length ; i++){
                if(data[i].nombre_servicio==descripcion){
                    precio=data[i].precio;
                }
            }

            const mostrarContenidoCita = document.querySelector(".mostrarContenidoCita");

            mostrarContenidoCita.innerHTML = `
            <div class="container mt-5 mb-5">
                <h1 class="text-center mb-4">Realizar Pago</h1>
                <h3 class="text-center mb-4 text-secondary">Detalle de Cita a Pagar</h3>
        
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
        
                        <!-- Precio -->
                        <div class="info-box mb-3 p-3 d-flex justify-content-between">
                            <span class="label text-secondary font-weight-bold">Precio:</span>
                            <span class="value text-success font-weight-bold">${precio} Lps</span>
                        </div>
        
                    </div>
                </div>
            </div>
        `;
        
            

        }
    })

 
    

// ---------------------------------------Fetch------------------------------------------------------------

    
    $.ajax({
        url: "../controllers/UsuariosPagosController.php",
        type: 'GET',
        // data: data,
        success: function (response) {
            let dato = JSON.parse(response);
            dato.forEach((element, index)=>{
                contenedorTarjetas.innerHTML  +=`
                <div class="form-check p-3 border rounded mb-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="tarjeta1" value="${element.id}">
                    <label class="form-check-label w-100 d-flex justify-content-around" for="tarjeta1">
                    

                        <div class="flex-grow-1 ">
                            <h5 class="mb-1">${element.nombre_tarjeta}</h5>
                            <p class="mb-1 text-muted">${element.numero_tarjeta}</p>
                            <p class="mb-0 text-muted">Expira: ${element.fecha_vencimiento}</p>
                        </div>
                        
                        <div>
                            <button data-id="${element.id}" class="btn btn-danger btn-sm btnEliminar">Eliminar</button>
                        </div>

                    <i class="bi bi-credit-card fs-3"></i> <!-- Ícono de tarjeta (opcional) -->
                    </label>
                </div> 
                `
                NumeroTarjeta=element.numero_tarjeta;
            })

        },
        error: function(data) {
            console.log(datos)
        },

    });
    
    document.addEventListener("change", (event) => {
        if (event.target.name === "flexRadioDefault") {
            Tarjeta=event.target.value;
        }
    });
})





contenedorTarjetas.addEventListener("click", function (e) {
    
    if (e.target.classList.contains("btnEliminar")) {
      const clickedButton = e.target;
      const id_Tarjeta = clickedButton.dataset.id;
        
      console.log(id_Tarjeta);

      $.ajax({
        url: "../controllers/UsuariosPagosController.php",
        type: "DELETE",
        data: {
            id_Tarjeta:id_Tarjeta,
        },
        success: function (response) {
            let dato=JSON.parse(response);
            alert("tarjeta eliminada exitosamente");
            setTimeout(()=>{
                window.location.reload();
            }, 500)
        },
        error: function(data) {
            console.log(data)
        },
    });
    }
});

btnPagar.addEventListener("click", ()=>{
    if(contenedorTarjetas.innerHTML.trim() === ""){
        contenedorTarjetas.innerHTML=`<p class="text-danger">ingrese una tarjeta antes de pagar</p>`
    }else{

        // el id de la cita
        const urlParams = new URLSearchParams(window.location.search);
        const idcita = urlParams.get('idcita'); // Obtiene el valor de "cita"

        if(idcita && Tarjeta){
            console.log(NumeroTarjeta);
            
             	

            $.ajax({
                url: "../controllers/UsuariosFacturaController.php",
                type: "POST",
                data: {
                    total:precio,
                    numero_tarjeta:NumeroTarjeta,
                    id_cita:idCita,
                },
                success: function (response){
                    alert('Pago realizado exitosamente!');

                    $.ajax({
                        url: "../controllers/UsuariosCitasController.php", 
                        type: "PUT", 
                        data: {
                            idCita: parseInt(idCita), 
                            estadoPago: 1,
                        },
                        success: function (response) {
                            console.log(JSON.stringify(response));
                            setTimeout(()=>{
                                window.location.href="./dashboardusuario-gestion_cita.php"
                            },500)
                            alert("Gracias por el pago!");
                        },
                        error: function (error) {
                            console.log('Error en la segunda llamada AJAX', error);
                        }
                    });
                }
            })

            
        }else {
            console.log("no hay tarjeta" );
        }

    }
     
})


agregarTarjeta.addEventListener("click",()=>{
    const nombre_tarjeta=document.querySelector("#nombreTarjeta").value;
    const numero_tarjeta=document.querySelector("#numeroTarjeta").value;
    const fecha_expiracion=document.querySelector("#fechaExpiracion").value;
    const CVV=document.querySelector("#cvv").value;
    // console.log(nombre_tarjeta, numero_tarjeta,fecha_expiracion,CVV);
    
    $.ajax({
        url: "../controllers/UsuariosPagosController.php",
        type: "POST",
        data: {
            nombre_tarjeta: nombre_tarjeta,
            numero_tarjeta: numero_tarjeta,
            fecha_expiracion: fecha_expiracion,
            CVV: CVV,
        },
        success: function (response) {
            let dato=JSON.parse(response);
            alert("tarjeta creada exitosamente");
            setTimeout(()=>{
                window.location.reload();
            }, 500)

        },
        error: function(data) {
            console.log(data)
        },

    });
})

