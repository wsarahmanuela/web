<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado IMC</title>
</head>
<body>
    <?php
    if(!isset($_POST['peso']) || !isset($_POST['altura'])){
        header("Location: imc_formulario.php?error=faltando_dados");
        exit();
    }
    $peso=$_POST['peso'];
    $altura=$_POST['altura'];

    if(!is_numeric($peso) || !is_numeric($altura)){
        header("Location: imc_formulario.php?error=valores_ivalidos");
        exit();
    }

    $imc = $peso / ($altura * $altura);
    $imc = round($imc, 2);
    echo "<h1>Resultado do calculo do IMC </h1>";
    echo '<p>Seu IMC é: $imc</p>/'
    ?>
    
</body>
</html>