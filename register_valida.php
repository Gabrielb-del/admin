<?php

$conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

if ($conexao->connect_error) {
    die("Erro de conexão: ". $conexao->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql_login = "INSERT INTO login (usuario, senha) VALUES (?,?)";
    $stmt_login = $conexao->prepare($sql_login);
    $stmt_login->bind_param("ss", $username, $password);
    $stmt_login->execute();

    header('Location: index.php');
    exit;
}

$conexao->close();
?>