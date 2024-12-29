<?php 
    require_once __DIR__.'/../database/database.php';
    require __DIR__.'/../models/servicios_mantenimiento.php';
    require __DIR__.'/../models/reparacion_vehiculos.php';

    // Inicialización de los modelos
    $mantenientoModelo = new servicios_mantenimiento($db);
    $reparacionoModelo = new reparacion_vehiculos($db);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $servicio = $_GET['servicio']; 

        if($servicio == "servicios_mantenimiento"){
            try {
                echo json_encode($mantenientoModelo->obtenerServicios()); 
            } catch (\Throwable $th) {
                echo json_encode(['success' => false, 'error' => $th->getMessage()]);
            }
        } else { 
            try {
                echo json_encode($reparacionoModelo->obtenerServicios());
            } catch (\Throwable $th) {
                echo json_encode(['success' => false, 'error' => $th->getMessage()]);
            }
        }
    }

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $servicio = $_POST['servicio']; 
        $nombre_servicio = $_POST['nombre_servicio']; 
        $descripcion = $_POST['descripcion']; 
        $precio = $_POST['precio']; 

        if($servicio == "servicio_mantenimiento"){
            try {
                echo json_encode($mantenientoModelo->crearServicios($nombre_servicio, $descripcion,$precio)); 
            } catch (\Throwable $th) {
                echo json_encode(['success' => false, 'error' => $th->getMessage()]);
            }
        } else { 
            try {
                echo json_encode($reparacionoModelo->crearServicios($nombre_servicio, $descripcion,$precio));
            } catch (\Throwable $th) {
                echo json_encode(['success' => false, 'error' => $th->getMessage()]);
            }
        }
    }
?>
