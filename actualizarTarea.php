<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$json= json_decode(file_get_contents("php://input"));

$server = "localhost";
$username = "root";
$password = "2004";
$database = "ionic";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

$idtarea = $json->idusuario;
$prioridad = $json->prioridad;
$tarea = $json->tarea;
$fecha_limite = $json->fecha_limite;
$descripcion = $json->descripcion;


$sql = "UPDATE tareas set  prioridad = '$prioridad', tarea='$tarea' , fecha_limite='$fecha_limite', descripcion='$descripcion' where idtarea='$idtarea'";

$res = mysqli_query($conn,$sql);
echo json_encode($res);
$conn->close();

