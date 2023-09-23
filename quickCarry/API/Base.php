<?php
$url = 'http://localhost/quickCarry/API/login.php';

$postParameters = [
    'user' => $_POST['user'],
    'pass' => $_POST['pass']
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

var_dump($data);

if ($data['resultado'] === true) {
    header("Location: http://localhost/quickCarry/index.html");
    exit;
} else {
    echo "<h1>Fallo en el Login. Usuario o Contraseña Inválidos</h1> <br>";
    echo "<h2>Inténtalo otra vez</h2>";
    ?>
    <button class="btn btn-register"><a href="http://localhost/quickCarry/API/login.html">Registrarse</a></button>
    <?php
}
?>
