<?php
session_start();
require_once("conexao.php");

$usuarios = select_usuarios();//lista do usuarios 
if(!isset($_POST['email'])||!isset($_POST['matricula'])){
    header("Location:login.php?error=faltando_dados");
    exit;
}//aqui ta verifincado os dados enviados
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$achou = false;//se deu certo

foreach($usuarios as $usuario)://se tem matricula email
    error_log("Entrou");//log de servidor 
    error_log("Comparando: ");
    error_log("EmailForm: ".$email."#");
    error_log("Email_bd:   " . $usuario['email'] . "#");
    error_log("Matricula_form: " . $matricula . "#");
    error_log("Matricula_bd:   " . $usuario['matricula'] . "#");

    if($email == $usuario['email']&& $matricula ==  $usuario['matricula']){//so pra ver se bate com o que ta salvo 
        error_log("Logim bem sucedido");
        $_SESSION['usuarioLogado'] = $usuario;//e vai salvar na sessao
        $_SESSION['usuarioID'] = $usuario['id'];
        $_SESSION['usuarioNome']= $usuario['nome'];
        $_SESSION['usuarioEmail'] = $usuario['email'];
        $_SESSION['logado']= true;

        $achou = true; 
        header("Location: menu.php");
        exit;
    }
endforeach;
if($achou == false){//aqui so é para verificar se tem o usuario ou nao 
    header("Location: login.php?error=dados_incorretos");
    exit;
}
?>