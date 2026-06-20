<?php

include 'conexao.php';

function obterNomeCategoria($id) {
    $categorias = [
        1 => "Celulares 📱",
        2 => "Acessórios 🎧",
        3 => "Tvs 📺"
    ];

    if (array_key_exists($id, $categorias)) {
        return $categorias[$id];
    } else {
        return "Outros Produtos 📦";
    }
}


$busca = isset($_GET['busca']) ? $_GET['busca'] : "";
$categoria_filtrada = isset($_GET['categoria']) ? $_GET['categoria'] : "";

$sql = "SELECT * FROM produtos";

if ($categoria_filtrada != "") {
    

    $cat_id = (int)$categoria_filtrada; 
    $sql .= " WHERE categoria_id = $cat_id";


} elseif ($busca != "") {
    
    $sql .= " WHERE nome LIKE '%$busca%' 
              OR categoria_id IN (
                  SELECT 1 WHERE 'celulares' LIKE '%$busca%'
                  UNION
                  SELECT 2 WHERE 'acessorios' LIKE '%$busca%' OR 'acessórios' LIKE '%$busca%'
                  UNION
                  SELECT 3 WHERE 'tvs' LIKE '%$busca%' OR 'tv' LIKE '%$busca%'
              )";
}

$sql .= " ORDER BY categoria_id ASC, id ASC";

$resultado = mysqli_query($conexao, $sql);

if ($categoria_filtrada != "") {
    echo "<h3 class='text-center mt-4'>Categoria: " . obterNomeCategoria($categoria_filtrada) . "</h3>";
} elseif ($busca != "") {
    echo "<h3 class='text-center mt-4'>Resultado da busca: " . htmlspecialchars($busca) . "</h3>";
}
?>

<section class="cardss">

    <?php 
    if(mysqli_num_rows($resultado) > 0) { 
        
        $categoria_atual = "";

        while($produto = mysqli_fetch_assoc($resultado)) { 
            

            $nome_categoria = obterNomeCategoria($produto['categoria_id']);

            if ($categoria_atual != $nome_categoria) {
                
                if ($categoria_atual != "") {
                    echo '</div></div>'; 
                }

                $categoria_atual = $nome_categoria;
                ?>
                <div class="container mt-5">
                    <h2 class="border-bottom pb-2 mb-4 fw-bold text-dark"><?php echo $categoria_atual; ?></h2>
                    <div class="row">
                <?php
            }
            ?>

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

        <?php }  
        
        echo '</div></div>';

    } else { ?>

        <div class="container text-center my-5">
            <div class="p-5 bg-white rounded shadow-sm border mx-auto" style="max-width: 600px;">
                <h3 class="text-danger fw-bold">Nenhum produto encontrado 🔍</h3>
                <p class="text-muted mt-3">Não encontramos resultados para o termo correspondente.</p>
                <a href="index.php" class="btn btn-dark btn-sm mt-3">Ver Todos os Produtos</a>
            </div>
        </div>

    <?php } ?>

</section>