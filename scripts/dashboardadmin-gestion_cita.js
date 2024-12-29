const tablecontainer =document.querySelector("tbody");

document.addEventListener("DOMContentLoaded", () => {
    $.ajax({
        url: '../controllers/AdminCitasController.php',
        type: 'GET',

        success: function(response) {
            let dato = JSON.parse(response);
            let citas = dato.citas;
            let usuarios = dato.usuario;
        
            tablecontainer.innerHTML = '';
        
            citas.forEach((cita, index) => {

                // Buscar el usuario correspondiente por el usuario_id
                let usuario = usuarios.find(u => u.id === cita.usuario_id);
                let nombreUsuario = usuario ? usuario.nombre : 'Usuario no encontrado';
                

                
                // Insertar la fila en la tabla
                tablecontainer.innerHTML += `
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${nombreUsuario}</td>
                        <td>${cita.fecha_cita}</td>
                        <td>${cita.hora || 'No especificada'}</td>
                        <td>${cita.tipo_servicio}</td>
                        <td>${cita.descripcion}</td>
                        <td>${cita.estado_cita}</td>
                        <td>${cita.PagoConfirmado === 0 ? 'No' : 'Sí'}</td>
                        <td>
                            <button data-id="${cita.id}" class="eliminar btn btn-danger">Eliminar</button>
                            ${cita.estado_cita === "Confirmada" ?  
                                `<button data-fecha_cita="${cita.fecha_cita}" 
                                data-tipo_servicio="${cita.tipo_servicio}" 
                                data-descripcion="${cita.descripcion}" 
                                data-id="${cita.id}" 
                                class="detalle btn btn-warning">Ver Detalle Orden</button>` 
                                : ''
                            }
                            ${cita.estado_cita === "Pendiente" ? 
                                `<button data-fecha_cita="${cita.fecha_cita}" 
                                         data-tipo_servicio="${cita.tipo_servicio}" 
                                         data-descripcion="${cita.descripcion}" 
                                         data-id="${cita.id}" 
                                         class="confirmar btn btn-success">Confirmar Cita</button>` 
                                : ''
                            }
                        </td>
                    </tr>
                `;
            });
        
            // Agregar los eventos a los botones después de que se agreguen al DOM
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
                    
                    window.location.href = `../pages/dashboardadmin-detalle_cita.php?idcita=${dataId}&fecha_cita=${dataFechaCita}&tipo_servicio=${dataTipoServicio}&descripcion=${dataDescripcion}`;
                    
                    
                });                                                                                                     
            });
        
            document.querySelectorAll('.confirmar').forEach(button => {
                button.addEventListener('click', function(e) {
                    const dataId = e.currentTarget.getAttribute('data-id');
                    // const dataFechaCita = e.currentTarget.getAttribute('data-fecha_cita');
                    // const dataTipoServicio = e.currentTarget.getAttribute('data-tipo_servicio');
                    // const dataDescripcion = e.currentTarget.getAttribute('data-descripcion');

                    $.ajax({
                        url: '../controllers/AdminCitasController.php',
                        type: 'PUT',
                        data: { idCita: dataId,
                                estadoConfirmado:"Confirmada" 
                        },
                        dataType: 'json',
                        success: function(respuesta) {
                            alert(respuesta.message);
                            window.location.reload();  // Recargar la página después de actualizar
                        }
                    });
                    
                });
            });
        
           
        },
        
        
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
});

