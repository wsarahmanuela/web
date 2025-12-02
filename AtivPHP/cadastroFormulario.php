<?php
session_start();
if (!isset($_POST['nome'], $_POST['email'], $_POST['matricula'], $_POST['dataNascimento'])) {//so ta verificando se existe os campos 
    header("Location: cadastrar.php?error=faltando_dados");//se estiver volta para o cadastro 
    exit;
}
if (strlen(trim($_POST['nome'])) == 0) {//so ta vendo se o nome esta sozinho
    header("Location: cadastrar.php?error=nome&email=".$_POST['email']."&matricula=".$_POST['matricula']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {//isso é pra ver se o email é valido 
    header("Location: cadastrar.php?error=email&nome=".$_POST['nome']."&matricula=".$_POST['matricula']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
if (!is_numeric($_POST['matricula']) || strlen($_POST['matricula']) < 1) {//isso so é pra ver se a matricula tem mais de 1
    header("Location: cadastrar.php?error=matricula&nome=".$_POST['nome']."&email=".$_POST['email']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
$dataHoje = date('Y-m-d');//se a data for hoje ou futura vai dar erro 
if (strtotime($_POST['dataNascimento']) >= strtotime($dataHoje)) {
    header("Location: cadastrar.php?error=data&nome=".$_POST['nome']."&email=".$_POST['email']."&matricula=".$_POST['matricula']);
    exit;
}
require_once("conexao.php");

$resultado = cadastra_usuario($_POST['email'], $_POST['nome'], $_POST['matricula'], $_POST['dataNascimento']);//isso so ta chamado a funçao que vai cadastrar no banco 

if ($resultado === true) {//salva o nome e vai para o menu onde vai estar a lista dos usuarios salvos 
    $_SESSION['logado'] = true;
    $_SESSION['usuario_nome'] = $_POST['nome'];
    header("Location: menu.php");
    exit;
}
if ($resultado === "duplicado") {//so ta verificando se ja tem esse email
    echo "<script>alert('Este email já está cadastrado!');</script>";
    header("Location: cadastrar.php?email=".$_POST['email']."&nome=".$_POST['nome']."&matricula=".$_POST['matricula']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
?>
