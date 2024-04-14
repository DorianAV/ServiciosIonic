<?php

header("Access-Control-Allow-Origin: *");
$correo = $_GET['correo'];


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
