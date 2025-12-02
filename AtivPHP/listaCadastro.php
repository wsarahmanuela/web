  <?php
require_once("Conexao.php");
$usuarios = select_usuarios();
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
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['id']) ?></td>
                <td><?php echo htmlspecialchars($usuario['nome']) ?></td>
                <td><?php echo htmlspecialchars($usuario['email']) ?></td>
                <td><?php echo htmlspecialchars($usuario['mateicula']) ?></td>
                <td>
                    <a href="editarCadastro.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                </td>
                <td>
                    <a href="excluirCadastro.php?id=<?php echo $usuario['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>