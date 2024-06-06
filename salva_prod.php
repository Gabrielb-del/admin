<?php
include ("database/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $marca = $_POST['marca'];

    $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    $sql_marca = "INSERT INTO marca (nome_marca) VALUES (?)";
    $stmt_marca = $conexao->prepare($sql_marca);
    $stmt_marca->bind_param("s", $marca);
    $stmt_marca->execute();
    $marca_id = $conexao->insert_id;
    $sql_produto = "INSERT INTO produto (nome_produto, valor_produto, marca_id) VALUES (?, ?, ?)";
    $stmt_produto = $conexao->prepare($sql_produto);
    $stmt_produto->bind_param("sss", $nome, $valor, $marca_id);

    if ($stmt_produto->execute()) {
        header("Location: produtos.php");
        exit();
    } else {
        echo "Erro ao executar: " . $stmt_produto->error;
    }

    $stmt_produto->close();
    $stmt_marca->close();
    $conexao->close();
} else {
    echo "Método de requisição inválido.";
}
?>