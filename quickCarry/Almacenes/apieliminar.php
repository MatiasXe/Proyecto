<?php
session_start();
header("Content-Type: application/json");
include('../API/conexion.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $datos = json_decode($json);
    
    // Verificar si se recibieron datos válidos
    if ($datos && isset($datos->QR)) {
        $QR = $con->real_escape_string($datos->QR);
        
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $con->prepare("DELETE FROM almacen WHERE QR = ?");
        $stmt->bind_param("s", $QR);
        
        if ($stmt->execute()) {
            $response['resultado'] = true;
        } else {
            $response['resultado'] = false;
            $response['error'] = $stmt->error; // Agregar detalles del error
        }
        
        $stmt->close();
    } else {
        $response['resultado'] = false;
        $response['error'] = 'Datos no válidos';
    }
} else {
    $response['resultado'] = false;
    $response['error'] = 'Método no permitido';
}

echo json_encode($response);

$con->close();
?>
