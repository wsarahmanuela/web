<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <label for="texto">Digite uma string:</label>
    <input type="text" name="texto" id="texto" required>
    <br><br>
    <button type="submit">Analisar</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST["texto"];

    $textoSemEspacos = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $texto));
    //tamanho da string
    $tamanho = strlen($texto);
    //palíndromo
    $palindromo = ($textoSemEspacos == strrev($textoSemEspacos)) ? "Sim" : "Não";
    $vogais = preg_match_all("/[aeiouAEIOU]/", $texto);
    $consoantes = preg_match_all("/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/", $texto);

    echo "<p>String informada: $texto</p>";
    echo "<p>Tamanho da string: $tamanho</p>";
    echo "<p>Palíndromo: $palindromo</p>";
    echo "<p>Número de vogais: $vogais</p>";
    echo "<p>Número de consoantes: $consoantes</p>";
}
?>
</body>
</html>