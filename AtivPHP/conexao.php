<?php
function connecta_bd(){
    $servername = "localhost";
    $username = "root";
    $password = "Glsarah25!";
    $dbname = "escola";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",  $username,  $password);//aqui ta criando um pdo para os dados ir para o banco  
    return $pdo;
}
function cadastra_usuario($email, $nome, $matricula, $dataNascimento){//recebendo os dados 
    $con = connecta_bd();

    try {//so é o comando do banco 
        $stmt = $con->prepare("
            INSERT INTO usuarios (email, nome, matricula, data_nascimento)
            VALUES (:email, :nome, :matricula, :data_nascimento)
        ");//sao os valores 
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':data_nascimento', $dataNascimento);
        $stmt->execute();
        return true;

    } catch (PDOException $e) {//email duplicado 
        if ($e->getCode() == 23000) {
            return "erro";
        }
    }
}
function delete_usuario($id){
    $con = connecta_bd();
    $stmt = $con->prepare("DELETE FROM usuarios WHERE id = :id");//deleta pelo id
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
function update_usuario($id, $email, $nome, $matricula, $data_nascimento){
    $con = connecta_bd();
    $stmt = $con->prepare("
        UPDATE usuarios
        SET email = :email, nome = :nome, matricula = :matricula, data_nascimento = :data_nascimento
        WHERE id = :id
    ");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    return $stmt->execute();
}
function select_usuario($id){//buscra o usuario 
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function select_usuarios(){//buscar todos
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM usuarios ORDER BY id ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
