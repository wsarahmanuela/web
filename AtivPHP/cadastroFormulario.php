<?php
session_start();
if (!isset($_POST['nome'], $_POST['email'], $_POST['matricula'], $_POST['dataNascimento'])) {
    header("Location: cadastrar.php?error=faltando_dados");
    exit;
}
if (strlen(trim($_POST['nome'])) == 0) {
    header("Location: cadastrar.php?error=nome&email=".$_POST['email']."&matricula=".$_POST['matricula']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: cadastrar.php?error=email&nome=".$_POST['nome']."&matricula=".$_POST['matricula']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
if (!is_numeric($_POST['matricula']) || strlen($_POST['matricula']) < 1) {
    header("Location: cadastrar.php?error=matricula&nome=".$_POST['nome']."&email=".$_POST['email']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
$dataHoje = date('Y-m-d');
if (strtotime($_POST['dataNascimento']) >= strtotime($dataHoje)) {
    header("Location: cadastrar.php?error=data&nome=".$_POST['nome']."&email=".$_POST['email']."&matricula=".$_POST['matricula']);
    exit;
}
require_once("conexao.php");

$resultado = cadastra_usuario($_POST['email'], $_POST['nome'], $_POST['matricula'], $_POST['dataNascimento']);

if ($resultado === true) {
    $_SESSION['logado'] = true;
    $_SESSION['usuario_nome'] = $_POST['nome'];
    header("Location: menu.php");
    exit;
}
if ($resultado === "duplicado") {
    echo "<script>alert('Este email já está cadastrado!');</script>";
    header("Location: cadastrar.php?email=".$_POST['email']."&nome=".$_POST['nome']."&matricula=".$_POST['matricula']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}
echo "<script>alert('Erro');</script>";
header("Location: cadastrar.php");
exit;
?>
