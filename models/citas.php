<?php

class  cita{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function crearCita($idusuario, $fechaCita, $tipoServicio, $descripcion, $estadoCita, $hora) {
        if (!empty($idusuario) && !empty($fechaCita) && !empty($tipoServicio) && !empty($descripcion) && !empty($estadoCita) && !empty($hora)) {
            $sql = 'INSERT INTO citas (usuario_id, fecha_cita, tipo_servicio, descripcion, estado_cita, hora)
                    VALUES (?, ?, ?, ?, ?, ?);';
    
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('isssss', $idusuario, $fechaCita, $tipoServicio, $descripcion, $estadoCita, $hora);
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                throw new Exception('Error al ejecutar la consulta SQL.');
            }
        } else {
            throw new Exception('Error: Todos los campos son obligatorios.');
        }
    }

    public function obtenerCitas() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            throw new Exception('Error: No hay usuario en la sesión');
        }
    
        $id = $_SESSION['user_id'];
        $roll = $_SESSION['roll'];
    
        if ($id && $roll == 0) {
            // Usuarios normales (filtrados por usuario_id)
            $sql = 'SELECT * FROM citas WHERE usuario_id = ?'; 
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('i', $id); 
            $stmt->execute();
            $result = $stmt->get_result();
    
            $citas = [];
            while ($row = $result->fetch_assoc()) {
                $citas[] = $row; 
            }
    
            $stmt->close();
            return $citas; 
    
        } else if ($id && $roll == 1) {
            // Usuarios administradores (ver todas las citas)
            $sql = 'SELECT * FROM citas'; 
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $citas = [];
            while ($row = $result->fetch_assoc()) {
                $citas[] = $row; 
            }
    
            $stmt->close();
            return $citas; 
    
        } else {
            throw new Exception('Error: No hay usuario en la sesión');
        }
    }
    
    
    public function eliminarCita($idCita){
        if (!isset($idCita)) {
            throw new Exception('Error: no hay cita');
        }

        $sql = 'DELETE from citas where id = ?;';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $idCita);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception('Error al ejecutar la consulta SQL.');
        }

    }

    

    public function actualizarEstadoPago($idCita, $estadoPago) {
        if (empty($idCita) || !isset($estadoPago)) {
            throw new Exception('Error: falta el ID de la cita o el estado de pago');
        }

        $sql = 'UPDATE citas SET PagoConfirmado = ? WHERE id = ?';
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $estadoPago, $idCita); 
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception('Error al ejecutar la consulta de actualización');
        }
    }

    public function actualizarEstado($idCita, $estadoConfirmado) {
        if (empty($idCita) || !isset($estadoConfirmado)) {
            throw new Exception('Error: falta el ID de la cita o el estado de pago');
        }

        $sql = 'UPDATE citas SET estado_cita = ? WHERE id = ?';
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('si', $estadoConfirmado, $idCita); 
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception('Error al ejecutar la consulta de actualización');
        }
    }
}

?>