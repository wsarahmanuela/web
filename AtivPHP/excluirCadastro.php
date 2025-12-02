<?php
require_once ("Conexao.php");
delete_usuario($_GET['id']);//apagando o usuario com o ID da url
header("Location: menu.php");
exit;
?>