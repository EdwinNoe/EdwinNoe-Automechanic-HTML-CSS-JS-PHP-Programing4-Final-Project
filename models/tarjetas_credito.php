<?php
class tarjetas_credito{
    private $db;

    public function __construct ($db){
        $this->db = $db;
    }
    
    public function obtenerTarjetas() {
        session_start();
            if (!isset($_SESSION['user_id'])) {
            throw new Exception('Error: No hay tarjetas en la sesión');
        }
        $id = $_SESSION['user_id'];
        if ($id) {
            $sql = 'SELECT * FROM tarjetas_credito WHERE usuario_id = ?'; 
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('i', $id); 
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

    public function eliminarTarjetas($idTarjeta){
        session_start();
        if (!isset($_SESSION['user_id'])) {
          throw new Exception('Error: No hay tarjetas en la sesión');
        }
        $id = $_SESSION['user_id'];
        
        if (!isset($idTarjeta)) {
            throw new Exception('Error: no hay tarjeta');
        }

        $sql = 'DELETE from tarjetas_credito where id = ?;';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $idTarjeta);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception('Error al ejecutar la consulta SQL.');
        }

    }

    public function crearTarjetas($numero_tarjeta, $fecha_expiracion, $idusuario, $nombre_tarjeta, $CVV){
        if (!empty($numero_tarjeta) && !empty($fecha_expiracion) && !empty($idusuario) && !empty($nombre_tarjeta) && !empty($CVV)) {
            $sql = 'insert into tarjetas_credito (numero_tarjeta, fecha_vencimiento, usuario_id, nombre_tarjeta, cvv)
                    values(?,?,?,?,?);';

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ssisi', $numero_tarjeta, $fecha_expiracion, $idusuario, $nombre_tarjeta, $CVV);

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
}

?>