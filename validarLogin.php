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
$password = $_GET['password'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
$con = mysqli_connect('localhost', 'sifsgliims', 'Tb59I$a7up5qLihv', 'ionic');
$res = mysqli_query($con, $sql);
$response = array();
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $nombre = $row['Nombre'];
    $response['success'] = true;
    $response['nombre'] = $nombre;
    $response['idusuario'] = $row['idusuario'];
} else {
    $response['success'] = false;
}
mysqli_close($con);
echo json_encode($response);
?>