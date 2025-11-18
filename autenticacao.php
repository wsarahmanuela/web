<?php

 if(!isset($_POST['username']) || !isset($_POST['password'])){
        header("Location: imc_formulario.php?error=faltando_dados");
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === "adimn" && $password === "123"){
        header("Location: imc")
    }