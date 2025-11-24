<?php
include "conexao.php"; 
$id = $_GET['id'];

$sql = "DELETE FROM alunos WHERE id = $id";

if (mysqli_query($con, $sql)) {
    header("Location: listar.php");
} else {
    echo "Erro ao excluir";
}
?>
