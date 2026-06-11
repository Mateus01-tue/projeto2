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

$resultado = mysqli_query($conexao, $sql);

if($busca != "")
{
    echo "<h3 class='text-center mt-4'>Resultado da busca: $busca</h3>";
}
?>

<section class="cardss">

```
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
```

</section>
