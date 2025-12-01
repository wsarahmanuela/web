<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>

<?php
if (isset($_POST['nome'], $_POST['email'], $_POST['peso'], $_POST['altura'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $peso = (float) $_POST['peso'];
    $altura = (float) $_POST['altura'];

    $imc = $peso / ($altura * $altura);
    $imcFormatado = number_format($imc, 2); 

    echo "<h2>Resultado do IMC</h2>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Peso:</strong> $peso kg</p>";
    echo "<p><strong>Altura:</strong> $altura m</p>";
    echo "<p><strong>IMC:</strong> $imcFormatado</p>";
} else {
    echo "<p>Dados incompletos. Volte e preencha todos os campos.</p>";
}
?>
</body>
</html>
