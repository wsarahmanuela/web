<?php
    require_once ("conexao.php");
     if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<script>alert('ID não encontrado'); window.location.href='menu.php';</script>";
        exit;
    }
    $usuario = select_usuario($_GET['id']);
    if (!$usuario) {
        echo "<script>alert('Usuario não encontrado!'); window.location.href='menu.php';</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
    <link rel="stylesheet" href="editarCadastro.css?v=1">
</head>
<body>
<header>
        <h3>Edição de Cadastro</h3>
</header>
<div class="container">

<form action="EditarCadastroFormulario.php" method="POST">
       
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']) ?>">

       <label for="nome">Nome: </label>
       <input type="text" class="input" id="nome" name="nome"  value="<?php echo htmlspecialchars($usuario['nome'])?>  "><br></br>

       <label for="email">Email: </label>
       <input type="text" class="input" id="email" name="email"  value="<?php echo htmlspecialchars($usuario['email'])?>  "><br></br>

       <label for="telefone">Matricula: </label>
       <input type="text" class="input" id="matricula" name="matricula" value="<?php echo htmlspecialchars($usuario['matricula'])?>  "><br></br>  
        <input type="submit" id="button" value="Salvar">

</form>
</div>
</body>
</html>