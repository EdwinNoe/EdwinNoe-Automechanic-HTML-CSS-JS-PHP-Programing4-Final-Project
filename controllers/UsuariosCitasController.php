<?php
require_once __DIR__.'/../database/database.php';
require __DIR__.'/../models/citas.php';

    $citaModelo = new cita($db);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $idusuario = $_SESSION['user_id'];
        $fechaCita = $_POST['fecha_cita'];
        $tipoServicio = $_POST['tipoServicio'];
        $descripcion = $_POST['descripcion'];
        $estadoCita = $_POST['estado_cita'];
        $hora = $_POST['hora'];

        try {
            $citaModelo->crearCita($idusuario, $fechaCita, $tipoServicio, $descripcion, $estadoCita, $hora);
            echo json_encode(['success' => true, 'message' => 'Cita creada exitosamente']);
        } catch (\Throwable $th) {
            echo json_encode(['success' => false, 'error' => $th->getMessage()]);
        }
    }

    if($_SERVER['REQUEST_METHOD']== 'GET'){
        try {
            echo json_encode($citaModelo->obtenerCitas());
        } catch (\Throwable $th) {
            echo json_encode(['error' => $th->getMessage()]);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        
        parse_str(file_get_contents("php://input"), $data);
    
        if (isset($data['idCita'])) {
            $idCita = (int)$data['idCita'];
    
            try {
                $citaModelo->eliminarCita($idCita);
                echo json_encode(['message' =>  'Cita Eliminada' ]);
            } catch (Throwable $th) {
                http_response_code(500); // Código de error interno del servidor
                echo json_encode(['error' => $th->getMessage()]);
            }
        } else {
            http_response_code(400); // Código de solicitud incorrecta
            echo json_encode(['error' => 'El ID de la cita no fue proporcionado.']);
        }
    }
    

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

        parse_str(file_get_contents("php://input"), $data);

        if (isset($data['idCita']) && isset($data['estadoPago'])) {
            
            $idCita = (int)$data['idCita'];
            $estadoPago = $data['estadoPago'];
            try {

                $citaModelo->actualizarEstadoPago($idCita, $estadoPago);
                
                echo json_encode(["success" => true, "message" => "Estado de pago actualizado correctamente"]);

            } catch (Exception $e) {
                echo json_encode(["error" => $e->getMessage()]);
            }
        } else {
            echo json_encode(["error" => "Faltan parámetros"]);
        }
    }

?>