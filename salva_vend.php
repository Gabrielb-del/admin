<?php
include ("database/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $loja = $_POST['loja'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    $sql_estado = "INSERT INTO estado (UF) VALUES (?)";
    $stmt_estado = $conexao->prepare($sql_estado);
    $stmt_estado->bind_param("s", $estado);
    $stmt_estado->execute();
    $estado_id = $conexao->insert_id;

    $sql_cidade = "INSERT INTO cidade (nome_cidade, estado_id) VALUES (?, ?)";
    $stmt_cidade = $conexao->prepare($sql_cidade);
    $stmt_cidade->bind_param("si", $cidade, $estado_id);
    $stmt_cidade->execute();
    $cidade_id = $conexao->insert_id;

    $sql_loja = "INSERT INTO loja (nome_loja, cidade_id) VALUES (?, ?)";
    $stmt_loja = $conexao->prepare($sql_loja);
    $stmt_loja->bind_param("si", $loja, $cidade_id);
    $stmt_loja->execute();
    $loja_id = $conexao->insert_id;

    $sql_vendedor = "INSERT INTO vendedor (nome_vend, cpf, loja_id, cadastro) VALUES (?, ?, ?, NOW())";
    $stmt_vendedor = $conexao->prepare($sql_vendedor);
    $stmt_vendedor->bind_param("ssi", $nome, $cpf, $loja_id);

    if ($stmt_vendedor->execute()) {
        header("Location: vendedor.php");
        exit();
    } else {
        echo "Erro ao executar: " . $stmt_vendedor->error;
    }

    $stmt_vendedor->close();
    $stmt_loja->close();
    $stmt_cidade->close();
    $stmt_estado->close();
    $conexao->close();
} else {
    echo "Método de requisição inválido.";
}
?>