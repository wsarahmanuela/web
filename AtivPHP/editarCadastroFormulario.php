<?php
session_start();
require_once("conexao.php"); 
if (!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['matricula']) !isset($_POST['data_nascimento'])) {//aqui ta verificando se os dados foram enviados pelo post 
    header("Location: editarCadastro.php?error=dados_faltando");
    exit;
}
$id = $_POST['id'];//aqui so vai pegar os valores enviados
$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$data_nascimento = popen['data_nascimento'];
update_usuario($id, $email, $nome, $matricula, $data_nascimento);//banco
header("Location: menu.php?");//manda pra outra tela 
exit;
?>
