<?php
include_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE id = $id";

    // Executar a consulta
    if (mysqli_query($connect, $sql)) {
        header('Location: ../index.php');
        exit();
    } else {
        echo "Erro ao excluir cliente: " . mysqli_error($connect);
    }
} else {
    echo "ID não especificado.";
}
?>