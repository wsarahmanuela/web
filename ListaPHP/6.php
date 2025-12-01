<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <label for="numero">Digite um número:</label>
    <input type="number" name="numero" id="numero" required>
    <br><br>
    <button type="submit">Verificar</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];

    if($numero % 2 == 0){
        $resultado = "Par";
    }else{
        $resultado = "Impar";
    }
    echo "<p>O número informado foi: $numero</p>";
    echo "<p>Resultado: $resultado</p>";
}
?>
</body>
</html>