<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$json = json_decode(file_get_contents("php://input"));


$conn = new mysqli("localhost", "root", "2004", "ionic");

if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

$correo = $json->correo;
$nombre = $json->nombre;
$password = $json->password;

$sql = "INSERT INTO usuarios (correo, password, nombre) VALUES ('$correo', '$password', '$nombre')";
$existe = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo='$correo'");
$res = mysqli_query($conn, $sql);
$conn->close();

