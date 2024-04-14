<?php
header("Access-Control-Allow-Origin: *");

$correo = $_GET['correo'];
$password = $_GET['password'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
$con = mysqli_connect('localhost', 'root', '2004', 'ionic');
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