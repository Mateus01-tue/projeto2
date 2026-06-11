<?php

include 'conexao.php';

$busca = "";

if(isset($_GET['busca']))
{
    $busca = $_GET['busca'];
}

$sql = "SELECT * FROM produtos";


if($busca != "")
{
    $sql .= " WHERE nome LIKE '%$busca%'";
}


$sql .= " ORDER BY categoria_id ASC, id ASC";


$resultado = mysqli_query($conexao, $sql);

if($busca != "")
{
    echo "<h3 class='text-center mt-4'>Resultado da busca: " . htmlspecialchars($busca) . "</h3>";
}
?>

<section class="cardss">

    <?php if(mysqli_num_rows($resultado) > 0) { ?>

        <div class="container">
            <div class="row">

                <?php while($produto = mysqli_fetch_assoc($resultado)) { ?>

                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="imagens/<?php echo $produto['imagem']; ?>"
                                 class="produto-img"
                                 alt="<?php echo $produto['nome']; ?>">

                            <div class="card-body text-center">
                                <h5>
                                    <?php echo $produto['nome']; ?>
                                </h5>

                                <p>
                                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                </p>

                                <a href="produto.php?id=<?php echo $produto['id']; ?>"
                                   class="btn btn-dark">
                                    Ver Produto
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

    <?php } else { ?>

        <div class="container text-center my-5">
            <div class="p-5 bg-white rounded shadow-sm border mx-auto" style="max-width: 600px;">
                <h3 class="text-danger fw-bold">Nenhum produto encontrado 🔍</h3>
                <p class="text-muted mt-3">
                    Não encontramos resultados para o termo correspondente.
                </p>
                <p class="small text-secondary">
                    Verifique se o nome está correto ou tente buscar por palavras mais simples.
                </p>
                <a href="index.php" class="btn btn-dark btn-sm mt-3">Ver Todos os Produtos</a>
            </div>
        </div>

    <?php } ?>

</section>