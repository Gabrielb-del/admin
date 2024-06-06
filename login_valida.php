<?php
    session_start();

    include("./database/conectar.php");

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $query = "
        SELECT * FROM login
        WHERE usuario = '$usuario'
        AND senha='$senha'
    ";

    $resultado = $conexao->query($query);
    if ($resultado->num_rows > 0) {
        $_SESSION["logado"] = $usuario;
        header("Location: main.php");
    } else {
        header("Location: index.php");
    }
?>