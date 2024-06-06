<?php

$id = $_GET['id']; // id do produto a ser deletado

$conexao = new mysqli('127.0.0.1','root','','admin');
if ($conexao->connect_error) {
    die("Erro de conexão: ". $conexao->connect_error);
}

$sql = "DELETE FROM produto WHERE id = '$id'";
if ($conexao->query($sql) === TRUE) {
    header('Location: produtos.php');
    exit;
} else {
    echo "Erro ao deletar produto: ". $conexao->error;
}

$conexao->close();
?>