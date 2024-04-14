<?php

header("Access-Control-Allow-Origin: *");
// Resto del código PHP

$server = "localhost";
$username = "root";
$password = "2004";
$database = "ionic";


$conn = new mysqli($server , $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}


$idtarea = $_GET['idtarea'];

$sql = "UPDATE FROM tareas SET completado=1 WHERE idtarea = '$idtarea'";

$res = mysqli_query($conn,$sql);
echo json_encode($res);
$conn->close();


