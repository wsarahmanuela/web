<?php include "conexao.php"; ?>

<h2>Lista de Alunos</h2>
<a href="cadastrar.php">Cadastrar novos alunos</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Turma</th>
        <th>Ações</th>
    </tr>
<?php
$sql = "SELECT * FROM alunos";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['nome']."</td>
            <td>".$row['idade']."</td>
            <td>".$row['turma']."</td>
            <td>
                <a href='editar.php?id=".$row['id']."'>Editar</a> |
                <a href='excluir.php?id=".$row['id']."'>Excluir</a>
            </td>
          </tr>";
}
?>
</table>
