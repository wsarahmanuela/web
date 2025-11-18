<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <form action="autenticacao.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" require>
        <br><br>
        <label for="password">Passaword:</label>
        <input type="password" id="password" name="password" require>
        <br><br>
        <input type="submit" value="login">
</body>
</html>