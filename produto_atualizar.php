<?php

if (!isset($_POST['id']) || !isset($_POST['nome_produto']) || !isset($_POST['valor_produto']) || !isset($_POST['marca'])) {
    header('Location: produtos.php');
    exit;
}

$id = $_POST['id'];
$nome_produto = $_POST['nome_produto'];
$valor_produto = $_POST['valor_produto'];
$marca_id = $_POST['marca'];


$conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

if ($conexao->connect_error) {
    die("Erro ao conectarao banco de dados: " . $conexao->connect_error);
}

$sql = "UPDATE produto SET nome_produto = '$nome_produto', valor_produto = '$valor_produto', marca_id = '$marca_id' WHERE id = '$id'";
if ($conexao->query($sql) == TRUE) {
    header('Location: produtos.php');
    exit;
} else {
    echo "Erro ao atualizar o produto: " . $conexao->error;
}

$conexao->close();
