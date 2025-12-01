<?php
session_start();

if (!isset($_POST['nome'], $_POST['email'], $_POST['matricula'], $_POST['dataNascimento'])) {//oq vai ser insido no banco 
    header("Location: cadastro.php?error=faltando_dados");//manda ir para outra pagina se nao estiver faltando dados  
    exit;//isso serve so para script não continuar rodando
}
if (strlen($_POST['nome']) == 0) {
    header("Location: cadastro.php?error=nome&email=".$_POST['email']."&matricula=".$_POST['matricula']);
    exit;
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: cadastro.php?error=email&nome=".$_POST['nome']."&matricula=".$_POST['matricula']);
    exit;
}  

if (!is_numeric($_POST['matricula']) || strlen($_POST['matricula']) < 1) {
    header("Location: cadastro.php?error=matricula&nome=".$_POST['nome']."&email=".$_POST['email']);
    exit;
}
require_once("Conexao.php");//isso seria para incluir o arquivo de conexão

cadastra_usuario($_POST['email'], $_POST['nome'], $_POST['matricula'], $_POST['dataNascimento']);//aqui so ta cadastrando a funçao 
header("Location: login.php");
?>      