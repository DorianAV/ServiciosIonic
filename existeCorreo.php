<?php

// Permitir el acceso desde cualquier origen
header("Access-Control-Allow-Origin: *");

// Permitir ciertos métodos HTTP
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Permitir ciertos encabezados HTTP
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Permitir cookies a través de la API
header("Access-Control-Allow-Credentials: true");

$correo = $_GET['correo'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
$con = mysqli_connect('localhost', 'root', '2004', 'ionic');
$res = mysqli_query($con, $sql);
$response = false; // Inicializamos la respuesta como false

if (mysqli_num_rows($res) > 0) {
    $response = true; // Si hay resultados, el correo existe en la base de datos
}

mysqli_close($con);
echo json_encode($res); // Convertimos la respuesta a JSON antes de devolverla
?>
