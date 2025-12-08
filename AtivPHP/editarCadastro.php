<?php
    require_once ("conexao.php");//uma vez
     if (!isset($_GET['id']) || empty($_GET['id'])) {//pegar e nao esta vazio
         header("Location: cadastrar.php?error=id_nao_encontrado");
    }
    $usuario = select_usuario($_GET['id']);//buscar o usuario chamando a funcao 
    if (!$usuario) {//se ele existe
         header("Location: cadastro.php?error=usuario_nao_encontrado");  
         exit;//isso serve so para script não continuar rodando
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
       
        <input type="hidden" name="id" value="<?php echo ($usuario['id']) ?>">

       <label for="nome">Nome: </label>
       <input type="text" class="input" id="nome" name="nome"  value="<?php echo ($usuario['nome'])?>"><br></br>

       <label for="email">Email: </label>
       <input type="text" class="input" id="email" name="email"  value="<?php echo ($usuario['email'])?>"><br></br>

       <label for="telefone">Matricula: </label>
       <input type="text" class="input" id="matricula" name="matricula" value="<?php echo ($usuario['matricula'])?>"><br></br>  

        <label for="dataNascimento">Data de Nascimento: </label>
        <input class="input" type="date" id="dataNascimento" name="dataNascimento" value="<?php echo ($usuario['data_nascimento'])?>"><br></br>   
        <input type="submit" id="button" value="Salvar">
</form>
</div>
</body>
</html>