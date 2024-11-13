<?php
include_once 'php_action/db_connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Listar Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main">
        <h2>Lista de Clientes</h2>
        <table class="tabela">
            <thead>
                <th>Nome</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Ações</th>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_array($resultado)):
                ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['cidade']; ?></td>
                        <td>
                            <a href="php_action/delete.php?id=<?php echo $dados['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <img src="img/icodelete.png" alt="Excluir">
                            </a>

                            <a href="php_action/editC.php?id=<?php echo $dados['id']; ?>">
                                <img src="img/icoedit.png" alt="Editar">
                            </a>
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>

            </tbody>
        </table>

        <a href="InsertC.php">
            <input class="btn" type="button" value="Cadastrar Cliente">
        </a>
    </div>
</body>

</html>