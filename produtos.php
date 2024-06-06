<?php
include ("pages/superior.php");
?>


<main id="main" class="main">


  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Default Table</h5>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');
                $sql = "SELECT p.id, p.nome_produto, p.valor_produto, m.nome_marca AS marca 
                                FROM produto p 
                                INNER JOIN marca m ON p.marca_id = m.id";
                $resultado = $conexao->query($sql);
                while ($dados = $resultado->fetch_assoc()) {
                  echo "<tr>
                                <td>" . $dados["id"] . "</td>
                                <td>" . $dados['nome_produto'] . "</td>
                                <td>R$" . $dados['valor_produto'] . "</td>
                                <td>" . $dados['marca'] . "</td>
                                <td>
                                    <a href='produto_alterar.php?id=" . $dados["id"] . "' style='text-decoration:none'><i class='ri-brush-line'></i></a>
                                    <a href='produto_deletar.php?id=" . $dados["id"] . "' style='text-decoration:none'><i class='ri-delete-bin-line'></i></a>
                                </td>
                            </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>

</main>