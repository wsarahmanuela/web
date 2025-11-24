<?php
$host = "localhost";
$user = "root"; 
$pass = "Glsarah25!"; 
$db = "escola";

$con = mysqli_connect($host, $user, $pass, $db);
if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
