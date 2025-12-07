<?php 
    session_start();
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header("Location: Login.php");
        exit;
    }
    require_once("conexao.php");
    $usuarios = select_usuarios();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <header>
        <h1>Bem-vindo(a)!</h1>
        <nav>
            <a href="cadastrar.php">Sair</a>
        </nav>
    </header>
    
    <div class="container">
        <h2>Lista dos Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matrícula</th>
                    <th>Data de nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo ($u['id']); ?></td>
                    <td><?php echo ($u['nome']); ?></td>
                    <td><?php echo ($u['email']); ?></td>
                    <td><?php echo ($u['matricula']); ?></td>
                    <td><?php echo ($u['data_nascimento']); ?></td>                             
                    <td>
                        <a href="editarCadastro.php?id=<?php echo $u['id']; ?>" class="btn-editar">Editar</a>
                        <a href="excluirCadastro.php?id=<?php echo $u['id']; ?>" class="btn-deletar">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>