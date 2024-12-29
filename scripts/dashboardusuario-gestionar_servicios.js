
document.getElementById('serviceForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const serviceType = document.getElementById('serviceType').value;
    const serviceName = document.getElementById('serviceName').value;
    const serviceDescription = document.getElementById('serviceDescription').value;
    const servicePrice = document.getElementById('servicePrice').value;

    $.ajax({
        url: "../controllers/ReparacionMantemientoController.php",
        type: 'POST',
        data: { 
            servicio:serviceType ,
            nombre_servicio:serviceName,
            descripcion:serviceDescription,
            precio:servicePrice,
        },
        success: function (respuesta) {
            alert("Servicio Ingresado Exitosamente , ahora los usuarios podran Ver el nuevo servicio")

        }
    })

});
