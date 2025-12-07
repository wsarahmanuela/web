<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css?v=1">
</head>
<body>
    <header>
        <h1>Cadastro</h1>
    </header>
    <div class="container">
    
    <form action="cadastroFormulario.php" method="POST">
       
        <label for="nome">Nome: </label><!--get vai pegar o valor, o issert vai verificar se existe-->
        <input class="input" type="text" id="nome" name="nome" value="<?php echo isset($_GET['nome']) ? $_GET['nome']: ''; ?>"><br><br>

        <label for="email">Email: </label>
        <input class="input" type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email']: ''; ?>"><br><br>

        <label for="matricula">Matrícula: </label>
        <input class="input" type="number" id="matricula" name="matricula" value="<?php echo isset($_GET['matricula']) ? $_GET['matricula']: ''; ?>"><br><br>

        <label for="dataNascimento">Data de Nascimento: </label>
        <input class="input" type="date" id="dataNascimento" name="dataNascimento" value="<?php echo isset($_GET['dataNascimento']) ? $_GET['dataNascimento']: ''; ?>"><br><br>
        <input type="submit" id="button" value="Cadastrar">
    </form>
    </div>
</body>
</html>