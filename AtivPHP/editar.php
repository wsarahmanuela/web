<?php 
include "conexao.php";
$id = $_GET['id'];

$sql = "SELECT * FROM alunos WHERE id = $id";
$result = mysqli_query($con, $sql);
$aluno = mysqli_fetch_assoc($result);
?>

<h2>Editar Aluno</h2>

<form method="POST">
    Nome: <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>"><br><br>
    Idade: <input type="number" name="idade" value="<?php echo $aluno['idade']; ?>"><br><br>
    Turma: <input type="text" name="turma" value="<?php echo $aluno['turma']; ?>"><br><br>
    <button type="submit" name="atualizar">Atualizar</button>
</form>

<?php
if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $turma = $_POST['turma'];

    $sql = "UPDATE alunos SET nome='$nome', idade='$idade', turma='$turma' WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar";
    }
}
?>
