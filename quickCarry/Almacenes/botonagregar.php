<?php
$url = 'http://localhost/quickCarry/Almacenes/apiagregar.php';

$postParameters = [
    'QR' => $_POST['QR'],
    'peso' => $_POST['peso'],
    'contenido' => $_POST['contenido'],
    'tipo' => $_POST['tipo']
];

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($postParameters),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

if (curl_errno($curl)) {
    $error_message = curl_error($curl);
    die('Error en la solicitud cURL: ' . $error_message);
}

curl_close($curl);

var_dump($response);
echo "<br>";

$data = json_decode($response, true);

if ($data === NULL) {
    die('Error al decodificar la respuesta JSON');
}

var_dump($data); // Verifica el contenido de $data

echo "<br>";

if ($data['resultado'] === true) {
    header('Location: http://localhost/quickCarry/Almacenes/Almacen.php');
    exit; 
} else {
    echo "No se pudo obtener el mensaje de la API.";
}
?>
