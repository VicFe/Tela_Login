<?php
include_once 'db_connect.php';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];

    $erro = "";  

    if (empty($nome) || empty($email) || empty($cidade)) {
        $erro = "Todos os campos devem ser preenchidos!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Por favor, insira um email válido!";
    }

    if (empty($erro)) {
        $sql = "INSERT INTO clientes (nome, email, cidade) VALUES ('$nome', '$email', '$cidade')";

        if (mysqli_query($connect, $sql)) {
            header('Location: ../index.php');
            exit();
        } else {
            $erro = "Erro ao cadastrar cliente: " . mysqli_error($connect);
        }
    }
}
?>