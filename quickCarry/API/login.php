<?php
session_start();
header("Content-Type: application/json");

include('conexion.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $datos = json_decode($json);
    
    if ($datos && isset($datos->user) && isset($datos->pass)) {
        $username = mysqli_real_escape_string($con, $datos->user);
        $password = mysqli_real_escape_string($con, $datos->pass);

        $sql = "SELECT * FROM user WHERE usu = '$username' AND contra = '$password'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $response['resultado'] = true;
            } else {
                $response['resultado'] = false;
            }
        } else {
            $response['resultado'] = false;
            $response['error'] = mysqli_error($con); // Agregar detalles del error
        }
    } else {
        $response['resultado'] = false;
    }
} else {
    $response['resultado'] = false;
}

echo json_encode($response);

mysqli_close($con);
?>
