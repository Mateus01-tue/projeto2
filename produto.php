<?php

include 'conexao.php'; 

$produto_encontrado = false;

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    
    // 3. Busca o produto no banco
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $produto = mysqli_fetch_assoc($resultado);
        $produto_encontrado = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto_encontrado ? $produto['nome'] : 'Produto não encontrado'; ?> - Adalto Cell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <?php if ($produto_encontrado) { ?>
            
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="imagens/<?php echo $produto['imagem']; ?>" class="img-fluid rounded shadow-sm" alt="<?php echo $produto['nome']; ?>" style="max-height: 400px; object-fit: contain;">
                </div>

                <div class="col-md-6">
                    <h1 class="fw-bold"><?php echo $produto['nome']; ?></h1>
                    <p class="text-muted fs-5"><?php echo $produto['descricao']; ?></p>
                    
                    <h3 class="text-success my-4">
                        R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                    </h3>

                    <div class="d-grid gap-2 d-md-block">
                        <a href="index.php" class="btn btn-dark px-4">
                            Voltar para a Loja
                        </a>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            
            <div class="text-center my-5">
                <h2 class="text-danger">Ops! Produto não encontrado.</h2>
                <p class="text-muted">O produto com o ID solicitado não existe neste banco de dados.</p>
                <a href="index.php" class="btn btn-primary">Voltar para a Loja</a>
            </div>

        <?php } ?>
    </div>

</body>
</html>