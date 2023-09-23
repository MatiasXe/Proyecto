<?php 
$url = 'http://localhost/quickCarry/API/login.php';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);


if(curl_errno($ch)) {
    $error_message = curl_error($ch);
    die('Error en la solicitud cURL: ' . $error_message);
}

curl_close($ch);

var_dump($response); // Verifica la respuesta de la API
echo"<br>";
$data = json_decode($response, true);

if($data === NULL){
    die('Error al decodificar la respuesta JSON');
}

var_dump($data); // Verifica la estructura de $data

if ($data['resultado'] === true) {
    echo "<h1><center> Logeado correctamente </center></h1>";
} else {
    echo "<h1>Fallo en el Login. Invalido Usuario o Contraseña</h1> <br>";
    echo "<h2>Inténtalo otra vez</h2>";
    ?>
    <button class="btn btn-register"><a href="http://localhost/quickCarry/API/login.html">Registrarse</a></button>
    <?php
}
