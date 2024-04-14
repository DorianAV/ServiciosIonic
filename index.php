<?php

header("Access-Control-Allow-Origin: *");

// Resto del código PHP

$idusuario = $_GET['idusuario'];


$con = mysqli_connect('dorian-server.mysql.database.azure.com', 'sifsgliims', 'Tb59I$a7up5qLihv', 'ionic');


$sql = "create table usuarios
(
    idusuario int auto_increment
        primary key,
    correo    varchar(100) not null,
    password  varchar(50)  not null,
    Nombre    varchar(50)  not null,
    constraint usuarios_pk_2
        unique (correo)
);
";

$result = mysqli_query($con,$sql);

$lista = array();

while($row = mysqli_fetch_array($result)) {
    $lista[] = $row;
}
echo json_encode($lista);

$con->close();

