<?php
    session_start();

    if (!isset($_SESSION["logado"]) || !isset($_SESSION["logado"])) {
        header("location: index.php");
        exit;
    }
?>