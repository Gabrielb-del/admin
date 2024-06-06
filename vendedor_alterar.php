<?php
include("pages/superior.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: vendedores.php');
  exit;
}

$id = $_GET['id'];

$conexao = new mysqli('127.0.0.1', 'root', '', 'admin');

if ($conexao->connect_error) {
  die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
}

$sql = "SELECT v.id, v.nome_vend, v.cpf, l.nome_loja AS loja, c.nome_cidade AS cidade, e.UF AS estado 
        FROM vendedor v 
        INNER JOIN loja l ON v.loja_id = l.id 
        INNER JOIN cidade c ON l.cidade_id = c.id 
        INNER JOIN estado e ON c.estado_id = e.id 
        WHERE v.id = '$id'";
$resultado = $conexao->query($sql);

if (!$resultado || $resultado->num_rows == 0) {
  header('Location: vendedores.php');
  exit;
}

$dados = $resultado->fetch_assoc();

$conexao->close();
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Alterar Vendedor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="main.php">Home</a></li>
        <li class="breadcrumb-item"><a href="vendedores.php">Vendedores</a></li>
        <li class="breadcrumb-item active">Alterar Vendedor</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Alterar Vendedor</h5>
            <form action="vendedor_atualizar.php" method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="mb-3">
                <label for="nome_vend" class="form-label">Nome do Vendedor</label>
                <input type="text" class="form-control" id="nome_vend" name="nome_vend" value="<?php echo $dados["nome_vend"]; ?>">
              </div>
              <div class="mb-3">
                <label for="cpf" class="form-label">CPF do Vendedor</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $dados["cpf"]; ?>">
              </div>
              <div class="mb-3">
                <label for="loja" class="form-label">Loja do Vendedor</label>
                <select class="form-select" id="loja" name="loja">
                  <?php
                  $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');
                  $sql_loja = "SELECT * FROM loja";
                  $resultado_loja = $conexao->query($sql_loja);
                  while ($dados_loja = $resultado_loja->fetch_assoc()) {
                    echo "<option value='" . $dados_loja["id"] . "'>" . $dados_loja["nome_loja"] . "</option>";
                  }
                  $conexao->close();
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="cidade" class="form-label">Cidade do Vendedor</label>
                <select class="form-select" id="cidade" name="cidade">
                  <?php
                  $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');
                  $sql_cidade = "SELECT * FROM cidade";
                  $resultado_cidade = $conexao->query($sql_cidade);
                  while ($dados_cidade = $resultado_cidade->fetch_assoc()) {
                    echo "<option value='" . $dados_cidade["id"] . "'>" . $dados_cidade["nome_cidade"] . "</option>";
                  }
                  $conexao->close();
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="estado" class="form-label">Estado do Vendedor</label>
                <select class="form-select" id="estado" name="estado">
                  <?php
                  $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');
                  $sql_estado = "SELECT * FROM estado";
                  $resultado_estado = $conexao->query($sql_estado);
                  while ($dados_estado = $resultado_estado->fetch_assoc()) {
                    echo "<option value='" . $dados_estado["id"] . "'>" . $dados_estado["UF"] . "</option>";
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