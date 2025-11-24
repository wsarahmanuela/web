<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
</head>
<body>

<h2>Cadastro de Alunos</h2>

<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    Idade: <input type="number" name="idade" required><br><br>
    Turma: <input type="text" name="turma" required><br><br>
    <button type="submit" name="salvar">Salvar</button>
</form>

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
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro" . mysqli_error($con);
    }
}
?>
