<?php

$id = $_POST['id'];
$nome_vend = $_POST['nome_vend'];
$cpf = $_POST['cpf'];
$loja = $_POST['loja'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

if ($conexao->connect_error) {
    die("Erro de conexão: ". $conexao->connect_error);
}

$sql_estado = "UPDATE estado SET UF = ? WHERE id = ?";
$stmt_estado = $conexao->prepare($sql_estado);
$stmt_estado->bind_param("si", $estado, $estado);
$stmt_estado->execute();

$sql_cidade = "UPDATE cidade SET nome_cidade = ?, estado_id = ? WHERE id = ?";
$stmt_cidade = $conexao->prepare($sql_cidade);
$stmt_cidade->bind_param("ssi", $cidade, $estado, $cidade);
$stmt_cidade->execute();

$sql_loja = "UPDATE loja SET nome_loja = ?, cidade_id = ? WHERE id = ?";
$stmt_loja = $conexao->prepare($sql_loja);
$stmt_loja->bind_param("ssi", $loja, $cidade, $loja);
$stmt_loja->execute();

$sql_vendedor = "UPDATE vendedor SET nome_vend = ?, cpf = ?, loja_id = ? WHERE id = ?";
$stmt_vendedor = $conexao->prepare($sql_vendedor);
$stmt_vendedor->bind_param("ssii", $nome_vend, $cpf, $loja, $id);
$stmt_vendedor->execute();

header('Location: vendedores.php');
exit;

$conexao->close();
?>