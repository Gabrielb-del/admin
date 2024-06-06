<?php
include ("pages/superior.php");


if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: produtos.php');
  exit;
}

$id = $_GET['id'];


$conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

if ($conexao->connect_error) {
  die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
}

$sql = "SELECT p.id, p.nome_produto, p.valor_produto, m.nome_marca AS marca 
        FROM produto p 
        INNER JOIN marca m ON p.marca_id = m.id 
        WHERE p.id = '$id'";
$resultado = $conexao->query($sql);

if (!$resultado || $resultado->num_rows == 0) {
  header('Location: produtos.php');
  exit;
}

$dados = $resultado->fetch_assoc();

$conexao->close();
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Alterar Produto</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="main.php">Home</a></li>
        <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
        <li class="breadcrumb-item active">Alterar Produto</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Alterar Produto</h5>
            <form action="produto_atualizar.php" method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="mb-3">
                <label for="nome_produto" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto"
                  value="<?php echo $dados["nome_produto"]; ?>">
              </div>
              <div class="mb-3">
                <label for="valor_produto" class="form-label">Valor do Produto</label>
                <input type="number" class="form-control" id="valor_produto" name="valor_produto"
                  value="<?php echo $dados["valor_produto"]; ?>">
              </div>
              <div class="mb-3">
                <label for="marca" class="form-label">Marca do Produto</label>
                <select class="form-select" id="marca" name="marca">
                  <?php
                  $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');
                  $sql_marca = "SELECT * FROM marca";
                  $resultado_marca = $conexao->query($sql_marca);
                  while ($dados_marca = $resultado_marca->fetch_assoc()) {
                    echo "<option value='" . $dados_marca["id"] . "'>" . $dados_marca["nome_marca"] . "</option>";
                  }
                  $conexao->close();
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>