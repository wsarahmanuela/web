<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cadastro</title>
</head>
<body>
    <h2>Formulario de Cadastro</h2>

    <?php
    if(isset($_GET["error"]  && $_GET["error"]=="faltando_dados")){
        echo ("erro");
    }
    ?>
    <form action="imc_resultado.php" method="POST">
        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso"  required>
        <br><br>
        
        <label for="altura">Altura:</label>
        <input type="text" id="altura" name="altura" required>
        <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
