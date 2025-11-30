<?php
require_once("conexao.php");
if (!isset($_GET['id'])) {
    header("Location: menu.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
</head>
<body>
    <h3>Editar Cadastro</h3>

    <dic class="container">
        <form action="editarCadastroFormulario.php" method="POST">
            <label for="nome">Nome:</label>
            <input class="input" type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>"><br><br>

            <label for="email">Email: </label>
            <input class="input" type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>"><br><br>

            <label for="matricula">Matricula: </label>
            <input class="input" type="number" id="matricula" name="matricula" value="<?php echo htmlspecialchars($usuario['matricula']); ?>"><br><br> 
            
            <input type="submit" id="button" value="Atualizar">
            <a href="menu.php" class="voltar">Cancelar</a>
        </form>
    </div>
</body>
</html>