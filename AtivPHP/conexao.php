<?php

function connecta_bd(){
    $servername = "localhost";
    $username = "root";
    $password = "Glsarah25!";
    $dbname = "escola";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function cadastra_usuario($email, $nome, $matricula, $dataNascimento){
    $con = connecta_bd();

    try {
        $stmt = $con->prepare("
            INSERT INTO usuarios (email, nome, matricula, data_nascimento)
            VALUES (:email, :nome, :matricula, :data_nascimento)
        ");

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':data_nascimento', $dataNascimento);

        $stmt->execute();
        return true;

    } catch (PDOException $e) {

        // erro de email duplicado
        if ($e->getCode() == 23000) {
            return "duplicado";
        }

        return "erro";
    }
}

function delete_usuario($id){
    $con = connecta_bd();
    $stmt = $con->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function update_usuario($id, $email, $nome, $matricula){
    $con = connecta_bd();
    $stmt = $con->prepare("
        UPDATE usuarios
        SET email = :email, nome = :nome, matricula = :matricula
        WHERE id = :id
    ");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':matricula', $matricula);

    return $stmt->execute();
}

function select_usuario($id){
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function select_usuarios(){
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM usuarios ORDER BY id ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
