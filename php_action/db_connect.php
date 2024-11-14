<?php
$username = "tela_login";
$servername = "179.188.16.47";
$password = "Ca1234@";
$db_name = "clientes";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
} else {
    echo "Conectado no Sistema";
}
?>