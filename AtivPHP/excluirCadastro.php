<?php
    require_once ("Conexao.php");
    delete_usuario($_GET['id']);
    header("Location: listaCadastro.php");
    exit;

?>