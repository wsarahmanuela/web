<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
</head>
<body>
    <form method="POST">
    <label for="numero">Digite um número:</label>
    <input type="number" name="numero" id="numero" required>
    <br><br>
    <button type="submit">Gerar Tabuada</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero = $_POST["numero"];

    echo "Tabuada do numero: $numero";

    for($i = 1; $i <= 10; $i++){
        $resultado = $numero * $i;
        echo "<li>$numero x $i = $resultado</li>";
    }
   
}
?>
</body>
</html>