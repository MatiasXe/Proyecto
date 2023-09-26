<?php
session_start();
header("Content-Type: application/json");

// Include database connection or initialize it if not already done
include('conexion.php');

$response = array();

// Check for request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $datos = json_decode($json);

    if ($datos && isset($datos->user) && isset($datos->pass)) {
        $username = mysqli_real_escape_string($con, $datos->user);
        $password = mysqli_real_escape_string($con, $datos->pass);

        $sql = "SELECT * FROM user WHERE usu = '$username' AND contra = '$password'";
        $result = mysqli_query($con, $sql);

        /*var_dump($result);
echo $username;
echo $password;*/
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $response['resultado'] = true;
            } else {
                $response['resultado'] = false;
            }
        } else {
            $response['resultado'] = false;
        }
    } else {
        $response['resultado'] = false;
    }
} else {
    $response['resultado'] = false;
}

// Return the JSON response
echo json_encode($response);

// Close the database connection
mysqli_close($con);
