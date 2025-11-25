<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IMC</title>
</head>
<body>

<?php
if (isset($_GET['nome']) && isset($_GET['email'])) {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
} else {
    echo "<p style='color:red;'>Dados nao recebidos. Volte para a página anterior.</p>";
    exit;
}
?>

<h2>Informações de Peso e Altura</h2>

<form action="9c.php" method="post">
    <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

    <label for="peso">Peso:</label>
    <input type="number" name="peso" id="peso" step="0.01" required>
    <br>

    <label for="altura">Altura:</label>
    <input type="number" name="altura" id="altura" step="0.01" required>
    <br>
    <button type="submit">Calcular</button>
</form>

</body>
</html>
