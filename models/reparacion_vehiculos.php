<?php
class reparacion_vehiculos{
    private $db;

    public function __construct ($db){
        $this->db = $db;
    }
    
    public function obtenerServicios() {
        $sql = 'SELECT * FROM reparacion_vehiculos'; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $tarjetas = [];
        while ($row = $result->fetch_assoc()) {
            $tarjetas[] = $row; 
        }
        $stmt->close();
        return $tarjetas; 
    }

    public function crearServicios($nombre_servicio, $descripcion,$precio) {
        if (!empty($nombre_servicio) && !empty($descripcion) && !empty($precio)) {
            $sql = 'INSERT INTO reparacion_vehiculos (nombre_servicio, descripcion, precio)
                    VALUES (?, ?, ?);';
    
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ssd', $nombre_servicio, $descripcion,$precio);
    
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