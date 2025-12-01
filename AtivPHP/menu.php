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
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <header>
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
        <nav>
            <a href="Logout.php">Sair</a>
        </nav>
    </header>
    
    <div class="container">
        <h2>Usuários Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matrícula</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?php echo htmlspecialchars($u['id']); ?></td>
                    <td><?php echo htmlspecialchars($u['nome']); ?></td>
                    <td><?php echo htmlspecialchars($u['email']); ?></td>
                    <td><?php echo htmlspecialchars($u['matricula']); ?></td>
                    <td>
                        <a href="EditarCadastro.php?id=<?php echo $u['id']; ?>" class="btn-editar">Editar</a>
                        <a href="DeletarUsuario.php?id=<?php echo $u['id']; ?>" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>