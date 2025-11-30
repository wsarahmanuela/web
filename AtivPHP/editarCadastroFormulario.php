<?php
session_start();

if (!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['matricula'])) {
    header("Location: menu.php?error=dados_faltando");
    exit;
}
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
update_usuario($email,$nome,$matricula);
header("Location: lista.php?");
exit;
?>
