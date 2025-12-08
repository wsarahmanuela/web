<?php
session_start();
require_once("conexao.php");

if(!isset($_POST['email']) || !isset($_POST['matricula'])){
    header("Location: login.php?error=faltando_dados");
    exit;
}
$email = $_POST['email'];
$matricula = $_POST['matricula'];

$usuario = select_usuario_email($email);//buscar o uusario
if (!$usuario) {
    header("Location: login.php?error=email_incorreto");
    exit;
}

if ($usuario['matricula'] !== $matricula) {
    header("Location: login.php?error=matricula_incorreta");
    exit;
}

// salvar na sessao
$_SESSION['usuarioLogado'] = $usuario;
$_SESSION['usuarioID'] = $usuario['id'];
$_SESSION['usuarioNome'] = $usuario['nome'];
$_SESSION['usuarioEmail'] = $usuario['email'];
$_SESSION['logado'] = true;
header("Location: menu.php");
exit;
?>
