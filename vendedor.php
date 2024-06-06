<?php
include ("pages/superior.php");

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Vendedores</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="main.php">Home</a></li>
                <li class="breadcrumb-item">Vendedores</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendedores</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Cadastro</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Loja</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conexao = new mysqli('127.0.0.1', 'root', '', 'admin');
                                if ($conexao->connect_error) {
                                    die("Error de conexão: " . $conexao->connect_error);
                                }
                                $sql = "SELECT v.id, v.nome_vend, v.cpf, l.nome_loja, c.nome_cidade, e.UF 
                                FROM vendedor v 
                                INNER JOIN loja l ON v.loja_id = l.id 
                                INNER JOIN cidade c ON l.cidade_id = c.id 
                                INNER JOIN estado e ON c.estado_id = e.id";
                                if (!$resultado = $conexao->query($sql)) {
                                    die("Error na consulta: " . $conexao->error);
                                }
                                if ($resultado->num_rows == 0) {
                                    echo "Não há registros na tabela vendedor";
                                } else {
                                    while ($dados = $resultado->fetch_assoc()) {
                                        echo "<tr>
                                    <td>" . $dados["id"] . "</td>
                                    <td>" . $dados['nome_vend'] . "</td>
                                    <td>" . $dados['cpf'] . "</td>
                                    <td>" . $dados['nome_loja'] . "</td>
                                    <td>" . $dados['nome_cidade'] . "</td>
                                    <td>" . $dados['UF'] . "</td>
                                    <td>
                                        <a href='vendedor_alterar.php?id=" . $dados["id"] . "' style='text-decoration:none'><i class='ri-brush-line'></i></a>
                                        <a href='vendedor_deletar.php?id=" . $dados["id"] . "' style='text-decoration:none'><i class='ri-delete-bin-line'></i></a>
                                    </td>
                                </tr>";
                                    }
                                }
                                $conexao->close();
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