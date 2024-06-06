<?php
include ("pages/superior.php");
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Adicionar vendedor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="main.php">Home</a></li>
                <li class="breadcrumb-item active">Adicionar Vendedor</li>
            </ol>
        </nav>
    </div>
    <form method="post" action="salva_vend.php">
        <h2>Adicionar Vendedor</h2>
        <div class="col-md-4">
            <label class='form-group'>
                Nome do Vendedor
            </label>
            <input type="text" name="nome" class="form-control">
        </div>
        <div class="col-md-4">
            <label class='form-group'>
                CPF
            </label>
            <div class="input-group">
                <input type="text" name="cpf" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <label class='form-group'>
                Loja
            </label>
            <input type="text" name="loja" class="form-control">
        </div>
        <div class="col-md-4">
            <label class='form-group'>
                Cidade
            </label>
            <input type="text" name="cidade" class="form-control">
        </div>
        <div class="col-md-2">
            <label class='form-group'>
                Estado
            </label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend">UF</span>
                <input type="text" name="estado" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <input type="submit" value="ADICIONAR" class="btn btn-primary">
            <a href="vendedor.php" class="btn btn-danger">CANCELAR</a>
        </div>
    </form>
</main>