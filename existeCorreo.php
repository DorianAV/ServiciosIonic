<?php

// Permitir el acceso desde cualquier origen
header("Access-Control-Allow-Origin: *");

// Permitir ciertos métodos HTTP
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Permitir ciertos encabezados HTTP
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Permitir cookies a través de la API
header("Access-Control-Allow-Credentials: true");$correo = $_GET['correo'];


$sql="SELECT * FROM usuarios WHERE correo='$correo'";
$con = mysqli_connect('localhost', 'root', '2004', 'ionic');
$res = mysqli_query($con, $sql);
$response = array();
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $response = true;
} else {
    $response = false;
}
mysqli_close($con);
echo $response;
?>