  <?php
require_once("Conexao.php");
$usuarios = select_usuarios();//so ta chamando uma funcao que vai ser buscado no banco
require_once ("menu.php");
?>

<link rel="stylesheet" href="listaCadastro.css?v=1">
<div class="container">
    <h1>Lista de usuários</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Matricula</th>
            <th>Data de nascimento
        </tr>
        <?php foreach ($usuarios as $usuario): ?><!--para fazer loop para as lista array-->
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['nome'] ?></td>
                <td><?php echo $usuario['email'] ?></td>
                <td><?php echo $usuario['matricula'] ?></td>
                <td><?php echo $usuario['data_nascimento'] ?></td>
                <td>
                    <a href="editarCadastro.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                </td>
                <td>
                    <a href="excluirCadastro.php?id=<?php echo $usuario['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach;
         ?>
    </table>
</div>