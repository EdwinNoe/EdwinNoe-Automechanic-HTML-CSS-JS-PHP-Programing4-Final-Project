<?php
require_once __DIR__.'/../database/database.php';
require __DIR__ . '/../models/facturas.php';

$facturaModelo = new factura($db);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        $idusuario = $_SESSION['user_id'];
        $total = $_POST['total'];
        $numero_tarjeta = $_POST['numero_tarjeta'];
        $id_cita= $_POST['id_cita'];
        try {
            $facturaModelo->crearFactura($total,$numero_tarjeta,$idusuario,$id_cita);
            echo json_encode(['success' => true, 'message' => 'Factura creada exitosamente']);
        } catch (\Throwable $th) {
            echo json_encode(['success' => false, 'error' => $th->getMessage()]);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['idCita'])) {
            $idCita = (int)$_GET['idCita'];
    
            try {
                echo json_encode($facturaModelo->obtenerFactura($idCita));
            } catch (Throwable $th) {
                http_response_code(500); // Código de error interno del servidor
                echo json_encode(['error' => $th->getMessage()]);
            }
        } else {
            http_response_code(400); // Código de solicitud incorrecta
            echo json_encode(['error' => 'El ID de la cita no fue proporcionado.']);
        }
    }

?>