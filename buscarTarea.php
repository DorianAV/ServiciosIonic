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

$idtarea = $_GET['idtarea'];

$sql = "select * from tareas where idtarea='$idtarea'";

$result = mysqli_query($conn,$sql);

$lista = array();

while($row = mysqli_fetch_array($result)) {
    $lista[] = $row;
}
echo json_encode($lista);

$conn->close();

