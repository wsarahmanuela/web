<?php
session_start();

if(!isset($_POST['nome'])|| !isset($_POST['email'])|| !isset($_POST['matricula']) || !isset($_POST['dataNascimento'])){
    header("Location: cadastro.php?error=faltando_dados");
    echo "<script> alert('Faltando Dados'); </script>";
    exit;
}
if (strlen($_POST['nome'])){
        echo "<script> alert('Faltando Dados'); </script>";
        header("Location: cadastro.php?nome=".$_POST['nome']."&email=".$_POST['email']."&matricula=".$_POST['matricula']);
        exit;
}
if (strlen($_POST['email'])){
        echo "<script> alert('Email invalido'); </script>";
        header("Location: cadastro.php?nome=".$_POST['nome']."&email=".$_POST['email']."&matricula=".$_POST['matricula']);
        exit;
}
if (!is_numeric($_POST['matricula']) || strlen($_POST['matricula']) < 1){
        echo "<script> alert('Matricula invalida'); </script>";
        header("Location: cadastro.php?nome=".$_POST['nome']."&email=".$_POST['email']."&matricula=".$_POST['matricula']);
        exit;
}
require_once("Conexao.php");//isso seria para incluir o arquivo de conexão

cadastra_usuario($_POST['email'], $_POST['nome'], $_POST['matricula'], $_POST['dataNascimento']);
header("Location: login.php");
?>