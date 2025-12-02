<?php
session_start();
require_once("conexao.php"); 
if (!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['matricula'])) {//aqui ta verificando se os dados foram enviados pelo post 
    header("Location: menu.php?error=dados_faltando");
    exit;
}
$id = $_POST['id'];//aqui so vai pegar os valores enviados
$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
update_usuario($id, $email, $nome, $matricula);//banco
header("Location: menu.php?");//manda pra outra tela 
exit;
?>
