<?php
    include("pages/superior.php");
?>
<main id="main" class="main">
<div class="pagetitle">
      <h1>Adicionar produto</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.php">Home</a></li>
          <li class="breadcrumb-item active">Adicionar produtos</li>
        </ol>
      </nav>
    </div>
<form method="post" action="salva_prod.php">
<h2>Adicionar Produto</h2>
<div class="col-md-4">
    <label class='form-group'>
        Nome do Produto
    </label>
    <input type="text" name="nome" class="form-control">
</div>
<div class="col-md-2">
    <label class='form-group'>
        Valor
    </label>
    <div class="input-group">
    <span class="input-group-text" id="inputGroupPrepend">R$</span>
    <input type="text" name="valor" class="form-control">
    </div>
</div>
<div class="col-md-4">
    <label class='form-group'>
        Marca
    </label>
    <input type="text" name="marca" class="form-control">
</div>
<div class="col-md-6">
    <input type="submit" value="ADICIONAR" class="btn btn-primary">
    <a href="produtos.php" class="btn btn-danger">CANCELAR</a>
</div>
</form>
</main>