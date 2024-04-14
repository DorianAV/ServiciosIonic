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

$idusuario = $json->idusuario;
$prioridad = $json->prioridad;
$tarea = $json->tarea;
$fecha_limite = $json->fecha_limite;
$descripcion = $json->descripcion;


$sql = "INSERT INTO tareas (idusuario, prioridad, tarea, completado, fecha_limite, descripcion) VALUES ('$idusuario', '$prioridad', '$tarea',0, '$fecha_limite', '$descripcion')";

$res = mysqli_query($conn,$sql);
echo json_encode($res);
$conn->close();

