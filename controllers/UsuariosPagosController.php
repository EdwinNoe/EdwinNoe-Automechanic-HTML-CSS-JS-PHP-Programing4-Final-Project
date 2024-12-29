<?php
require_once __DIR__.'/../database/database.php';
require __DIR__ . '/../models/tarjetas_credito.php';

$tarjetasModelo = new tarjetas_credito($db);

if($_SERVER['REQUEST_METHOD']== 'GET'){
    try {
        echo json_encode($tarjetasModelo->obtenerTarjetas());
    } catch (\Throwable $th) {
        echo json_encode(['error' => $th->getMessage()]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $idusuario = $_SESSION['user_id'];
    $nombre_tarjeta = $_POST['nombre_tarjeta'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $CVV = $_POST['CVV'];


    try {
        $tarjetasModelo->crearTarjetas($numero_tarjeta, $fecha_expiracion, $idusuario, $nombre_tarjeta, $CVV);
        echo json_encode(['success' => true, 'message' => 'Pago creada exitosamente']);
    } catch (\Throwable $th) {
        echo json_encode(['success' => false, 'error' => $th->getMessage()]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    parse_str(file_get_contents("php://input"), $data);

    if(isset($data['id_Tarjeta'])){
        $idTarjeta = (int)$data['id_Tarjeta'];

        try {
            $tarjetasModelo->eliminarTarjetas($idTarjeta);
            echo json_encode(['success' => true, 'message' => 'tarjeta Eliminada Exitosamente']);
        } catch (\Throwable $th) {
            echo json_encode(['success' => false, 'error' => $th->getMessage()]);
        }
    }
}

?>