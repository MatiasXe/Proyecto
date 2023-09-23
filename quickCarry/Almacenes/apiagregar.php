<?php
session_start();
header("Content-Type: application/json");
include('../API/conexion.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $datos = json_decode($json);

    if ($datos && isset($datos->QR) && isset($datos->peso) && isset($datos->tipo) && isset($datos->contenido)) {
        $QR = $con->real_escape_string($datos->QR);
        $peso = $con->real_escape_string($datos->peso);
        $tipo = $con->real_escape_string($datos->tipo);
        $contenido = $con->real_escape_string($datos->contenido);

        $insert = "INSERT INTO almacen (QR, Peso, Contenido, Tipo) VALUES ('$QR', '$peso','$contenido','$tipo')";

        if ($con->query($insert) === TRUE) {
            $response['resultado'] = true;
        } else {
            $response['resultado'] = false;
            $response['error'] = $con->error; // Agregar detalles del error
        }
    } else {
        $response['resultado'] = false;
    }
} else {
    $response['resultado'] = false;
}

echo json_encode($response);

$con->close();
?>
