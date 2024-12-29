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

                    </tr>
                `;
            });
        

        
           
        },
        
        
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
});

