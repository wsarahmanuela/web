<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
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
       
        <label for="nome">Nome: </label>
        <input class="input" type="text" id="nome" name="nome"  value="<?php $nome = isset($_GET['nome'])?$_GET['nome']:"" ;echo $nome ?>" ><br></br>

        <label for="email">Email: </label>
        <input class="input" type="text" id="email" name="email" value="<?php $email = isset($_GET['email'])?$_GET['email']:"" ;echo $email ?>" ><br></br>

        <label for="senha">Matricula: </label>
        <input class="input" type="number" id="matricula" name="matricula" value="<?php $matricula = isset($_GET['matricula'])?$_GET['matricula']:"" ;echo $matricula ?>"><br></br>


        <input type="submit" id="button" value="Cadastrar">
    </form>
    </div>
</body>
</html>
<br>
<a href="listar.php">Ver lista de toods os alunos</a>
</body>
</html>

<?php
if (isset($_POST['salvar'])) {
    include "conexao.php";

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $turma = $_POST['turma'];

    $sql = "INSERT INTO alunos (nome, idade, turma) VALUES ('$nome', '$idade', '$turma')";

    if (mysqli_query($con, $sql)) {
        echo "Aluno cadastrado com sucesso";
    } else {
        echo "Erro" . mysqli_error($con);
    }
}
?>

