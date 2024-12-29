<?php
function obtener_servicios_mantenimiento() {
    try {

        require __DIR__ . '/../database/database.php';
        $sql = "SELECT * FROM servicios_mantenimiento";
        $consulta = mysqli_query($db, $sql);
        if (!$consulta) {
            throw new Exception('Error en la consulta: ' . mysqli_error($db));
        }
        // Almacenar todos los resultados
        $resultados = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $resultados[] = $fila;
        }

        mysqli_close($db);
        return json_encode($resultados);

    } catch (\Throwable $th) {
        return json_encode(["error" => $th->getMessage()]);
    }
}

function obtener_servicios_reparacion() {
    try {

        require __DIR__ . '/../database/database.php';
        $sql = "SELECT * FROM reparacion_vehiculos";
        $consulta = mysqli_query($db, $sql);
        if (!$consulta) {
            throw new Exception('Error en la consulta: ' . mysqli_error($db));
        }
        // Almacenar todos los resultados
        $resultados = [];
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $resultados[] = $fila;
        }
        
        mysqli_close($db);
        return json_encode($resultados);

    } catch (\Throwable $th) {
        return json_encode(["error" => $th->getMessage()]);
    }

}
?>