<?php
$username = "tela_login";
$servername = "tela_login.mysql.dbaas.com.br";
$password = "Ca1234@";
$db_name = "clientes";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_error()) {
    echo "erro na conexao" . mysqli_connect();
} else {
    echo "Conectado no Sistema";
}
?>