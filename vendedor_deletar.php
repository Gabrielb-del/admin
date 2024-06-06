<?php

$id = $_GET['id'];

$conexao = new mysqli('127.0.0.1','root','','admin');
if ($conexao->connect_error) {
    die("Erro de conexão: ". $conexao->connect_error);
}

$sql = "DELETE FROM vendedor WHERE id = '$id'";
if ($conexao->query($sql) === TRUE) {
    header('Location: vendedor.php');
    exit;
} else {
    echo "Erro ao deletar vendedor: ". $conexao->error;
}

$conexao->close();
?>