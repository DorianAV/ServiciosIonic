<?php

header("Access-Control-Allow-Origin: *");

// Resto del código PHP

$idusuario = $_GET['idusuario'];


$con = mysqli_connect('dorian-server.mysql.database.azure.com', 'sifsgliims', 'Tb59I$a7up5qLihv', 'ionic');


$sql = "SELECT * FROM tareas where idusuario='$idusuario'";

$result = mysqli_query($con,$sql);

$lista = array();

while($row = mysqli_fetch_array($result)) {
    $lista[] = $row;
}
echo json_encode($lista);

$con->close();

