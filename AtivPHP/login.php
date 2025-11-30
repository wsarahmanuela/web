<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css?v=1">
</head>
<body>
   <header>
        <h1>Login</h1>
    </header>
    <div class="container">
    
    <form action="LoginProcesso.php" method="POST">
        <label for="email">Email: </label>
        <input type="text" class="input" id="email" name="email" ><br></br>
        <label for="senha">Senha: </label>
        <input type="text" class="input" id="senha" name="senha" ><br></br>
        <input type="submit" id="button" value="Entrar">
    </form>
    </div>

</body>
</html>