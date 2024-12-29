const tablecontainer = document.querySelector("tbody");


document.addEventListener("DOMContentLoaded", () => {
    $.ajax({
        url: '../controllers/UsuariosCitasController.php',
        type: 'GET',
        success: function(response) {
            
            let dato = JSON.parse(response);
            // console.log(response);
            tablecontainer.innerHTML = ''; // Limpia el contenido previo
            dato.forEach((element, index) => {
                tablecontainer.innerHTML += `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${element.fecha_cita}</td>
                    <td>${element.hora}</td>
                    <td>${element.tipo_servicio}</td>
                    <td>${element.descripcion}</td>
                    <td>${element.estado_cita}</td>
                    <td>${element.PagoConfirmado === 0 ? 'No' : 'Sí'}</td>
                    <td>
                        <button data-id="${element.id}" class="eliminar btn btn-danger">Eliminar</button>


                        ${element.PagoConfirmado === 1 ?  
                            `<button data-fecha_cita="${element.fecha_cita}" 
                            data-tipo_servicio="${element.tipo_servicio}" 
                            data-descripcion="${element.descripcion}" 
                            data-id="${element.id}" 
                            class="detalle btn btn-warning">Ver Detalle Orden</button>` 
                            :
                            ``
                        }
                        
                        ${element.PagoConfirmado === 0 ? 
                            `<button data-fecha_cita="${element.fecha_cita}" 
                                     data-tipo_servicio="${element.tipo_servicio}" 
                                     data-descripcion="${element.descripcion}" 
                                     data-id="${element.id}" 
                                     class="confirmar btn btn-success">Realizar Pago</button>` 
                            :``
                            // `<button data-fecha_cita="${element.fecha_cita}" 
                            // data-tipo_servicio="${element.tipo_servicio}" 
                            // data-descripcion="${element.descripcion}" 
                            // data-id="${element.id}" 
                            // class="detalle btn btn-warning">Realizar Pago</button>` 
                        }
                    </td>
                </tr>
            `;
            });

            // Ahora los botones están en el DOM y los eventos
            document.querySelectorAll('.eliminar').forEach(button => {
                button.addEventListener('click', function(e) {
                    const idCita = e.currentTarget.getAttribute('data-id');
                    if (confirm('Seguro que deseas eliminar esta cita?')) {
                        $.ajax({
                            url: '../controllers/AdminCitasController.php',
                            type: 'DELETE',
                            data: { idCita: idCita },
                            dataType: 'json',
                            success: function(respuesta) {
                                alert(respuesta.message);
                                window.location.reload();  // Recargar la página después de eliminar
                            }
                        });
                    }
                });
            });
            
            const btnDetalle = document.querySelectorAll(".detalle");
            btnDetalle.forEach(boton => {
                boton.addEventListener("click", (e) => {
                    const dataId = e.currentTarget.getAttribute('data-id');
                    const dataFechaCita = e.currentTarget.getAttribute('data-fecha_cita');
                    const dataTipoServicio = e.currentTarget.getAttribute('data-tipo_servicio');
                    const dataDescripcion = e.currentTarget.getAttribute('data-descripcion');
                    
                    window.location.href = `../pages/dashboardusuario-detalle_cita.php?idcita=${dataId}&fecha_cita=${dataFechaCita}&tipo_servicio=${dataTipoServicio}&descripcion=${dataDescripcion}`;
                    
                    
                });                                                                                                     
            });

            // agregar los evbents de los botones 
            const btnConfirmarPagar = document.querySelectorAll(".confirmar");
            btnConfirmarPagar.forEach(boton => {
                boton.addEventListener("click", (e) => {
                    const dataId = e.currentTarget.getAttribute('data-id');
                    const dataFechaCita = e.currentTarget.getAttribute('data-fecha_cita');
                    const dataTipoServicio = e.currentTarget.getAttribute('data-tipo_servicio');
                    const dataDescripcion = e.currentTarget.getAttribute('data-descripcion');
                    
                    window.location.href = `../pages/dashboardusuario-pago.php?idcita=${dataId}&fecha_cita=${dataFechaCita}&tipo_servicio=${dataTipoServicio}&descripcion=${dataDescripcion}`;
                    
                    
                });                                                                                                     
            });



        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
});

