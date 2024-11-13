<?php
include_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_assoc($resultado);

    if (!$dados) {
        header('Location: ../index.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}

if (isset($_POST['editar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];

    if (!empty($nome) && !empty($email) && !empty($cidade) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql_update = "UPDATE clientes SET nome = '$nome', email = '$email', cidade = '$cidade' WHERE id = $id";
        if (mysqli_query($connect, $sql_update)) {
            header('Location: ../index.php');
            exit();
        } else {
            $erro = "Erro ao atualizar cliente: " . mysqli_error($connect);
        }
    } else {
        $erro = "Por favor, preencha todos os campos corretamente. Certifique-se de que o email seja válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main">
        <h2>Editar Cliente</h2>

        <?php if (isset($erro)) {
            echo "<p style='color:red;'>$erro</p>";
        } ?>

        <form class="insert" action="editC.php?id=<?php echo $dados['id']; ?>" method="POST">
            <h3>Nome</h3>
            <input class="i" name="nome" value="<?php echo $dados['nome']; ?>" type="text">

            <h3>Email</h3>
            <input class="i" name="email" value="<?php echo $dados['email']; ?>" type="text">

            <h3>Cidade</h3>
            <input class="i" name="cidade" value="<?php echo $dados['cidade']; ?>" type="text">

            <button type="submit" class="btn" name="editar">Salvar Alterações</button>

            <a href="../index.php">
                <input class="btn" type="button" value="Cancelar">
            </a>
        </form>
    </div>
</body>

</html>