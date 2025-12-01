<?php
function connecta_bd(){
    $host = "localhost";
    $user = "root"; 
    $pass = "Glsarah25!"; 
    $db = "escola";
    $conexao = mysqli_connect($host, $user, $pass, $db);
    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }
    return $conexao;
}

function cadastra_usuario($email, $nome, $matricula, $dataNascimento){
    $conexao = connecta_bd();
    $stmt = $conexao->prepare("INSERT INTO usuarios (email, nome, matricula, data_nascimento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssis', $email, $nome, $matricula, $dataNascimento);
    $resultado = $stmt->execute();
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
    $stmt = $conexao->prepare("UPDATE usuarios SET email = ?, nome = ?, matricula = ? WHERE id = ?");
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
?>