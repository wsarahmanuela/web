<?php
$host = "localhost";
$user = "root"; 
$pass = "Glsarah25!"; 
$db = "escola";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
if (!$conexao) {
    die("Erro na conexao: " . mysqli_connect_error());
}
return $conexao;
function cadastro($email, $nome,$matricula){
    $conexao = connecta_bd();
    $stmt = $conexao->prepare("ISERT INTO usarios (email, nome, matricula)VALUES(?,?,?)");
    $stmt->bind_param('ssis', $email, $nome, $matricula);
    $resultado=$stmt->execute();
    $stmt->close();
    $conexao->close();
    return $resultado;
}
function delete_usuario($id){
    $conexao = connecta_bd();
    $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param('i', $id);
    $resultado = $stmt->execute();
    $stmt->close();
    $conexao->close();
    return $resultado;
}
function update_usuario($id, $email, $nome, $matricula){
    $conexao = connecta_bd();
    $stmt = $conexao->prepare("UPDATE usuarios SET email = ?, nome = ?, matricula = ?WHERE id = ?");
    $stmt->bind_param('ssii', $email, $nome, $matricula, $id);
    $resultado = $stmt->execute();
    $stmt->close();
    $conexao->close();
    return $resultado;
}
function select_usuario($id){
    $conexao = connecta_bd();
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    $conexao->close();
    return $usuario;
}
function select_usuarios(){
    $conexao = connecta_bd();
    $stmt = $conexao->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $result = $stmt->get_result();
    $usuarios = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conexao->close();
    return $usuarios;
}
?>
