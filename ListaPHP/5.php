<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio</title>
</head>
<body>
    <h2>Sorteio de Numeros</h2>
    <form method="POST">
        <label for="min">Valor minimo:</label>
        <input type="number" name="min" id="min"> 
        <br>

        <label for="max">Valor maximo:</label>
        <input type="number" name="max" id="max">
        <br>
        <button type="submit">Sortear</button>

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$min=$_POST["min"];
$max=$_POST["max"];

if($min <= $max){
    $numero = rand($min,$max);
    echo "Numero Sorteado: $numero";
}else{
    echo"O valor minimo deve ser menor ou igual ao valor maximo";
}
}

?>
</body>
</html>