<?php

class  factura{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function crearFactura($total, $numero_tarjeta,  $id_usuario, $id_cita) {
        if (!empty($total) && !empty($numero_tarjeta)) {
            $sql = 'INSERT INTO facturas (total, fecha_emision, numero_tarjeta, id_usuario, id_citas)
                    VALUES (?, NOW(), ?,?,?);';
    
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('dsii', $total, $numero_tarjeta, $id_usuario, $id_cita);
    
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

    public function obtenerFactura($id_cita) {
        session_start();
            if (!isset($_SESSION['user_id'])) {
            throw new Exception('Error: No hay Pago');
        }
        $id = $_SESSION['user_id'];
        if ($id) {
            $sql = 'SELECT * FROM facturas WHERE id_citas = ?'; 
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('i', $id_cita); 
            $stmt->execute();
            $result = $stmt->get_result();
    
            $tarjetas = [];
            while ($row = $result->fetch_assoc()) {
                $tarjetas[] = $row; 
            }
    
            $stmt->close();
            return $tarjetas; 
        } else {
            throw new Exception('Error: No hay usuario en la sesión');
        }
    }

}

?>