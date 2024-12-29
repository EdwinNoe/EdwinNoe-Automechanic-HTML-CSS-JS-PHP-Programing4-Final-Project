<?php
    require_once __DIR__.'/../database/database.php';
    require __DIR__.'/../models/citas.php';    
    require __DIR__.'/../models/usuario.php';   

    $citaModelo = new cita($db);
    $usuarioModelo=new Usuario($db);

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
            http_response_code(400); 
            echo json_encode(['error' => 'El ID de la cita no fue proporcionado.']);
        }
    }

    if($_SERVER['REQUEST_METHOD']== 'GET'){
        try {
            $response = [
                'usuario' => $usuarioModelo->obtenerrUsuario(), // Datos del usuario
                'citas' => $citaModelo->obtenerCitas() // Datos de las citas
            ];
            
            // Enviar la respuesta como JSON
            echo json_encode($response);
        } catch (\Throwable $th) {
            echo json_encode(['error' => $th->getMessage()]);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        
        parse_str(file_get_contents("php://input"), $data);
    
        if (isset($data['idCita'])) {
            $idCita = (int)$data['idCita'];
            $estadoConfirmado= (string)$data['estadoConfirmado'];
            try {
                $citaModelo->actualizarEstado($idCita,$estadoConfirmado);
                echo json_encode(['message' =>  'Cita Actualizada' ]);
            } catch (Throwable $th) {
                http_response_code(500); // Código de error interno del servidor
                echo json_encode(['error' => $th->getMessage()]);
            }
        } else {
            http_response_code(400); 
            echo json_encode(['error' => 'El ID de la cita no fue proporcionado.']);
        }
    }

?>
    
