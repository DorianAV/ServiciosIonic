<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");

$correo = $_GET['correo'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
$con = mysqli_connect('localhost', 'root', '2004', 'ionic');
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
    echo 'true';
} else {
    echo 'false';
}

mysqli_close($con);
?>
