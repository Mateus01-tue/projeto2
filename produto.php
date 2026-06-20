<?php
include 'conexao.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($resultado);


if (!$produto) {
    header("Location: index.php");
    exit;
}

$seu_numero = "5544997493842"; 
$mensagem = "Olá! Gostaria de saber mais sobre o produto: " . $produto['nome'] . " no valor de R$ " . number_format($produto['preco'], 2, ',', '.');
$link_whatsapp = "https://api.whatsapp.com/send?phone=" . $seu_numero . "&text=" . urlencode($mensagem);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto['nome']; ?> - Adalto CELL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body class="page-produto d-flex flex-column min-vh-100">

<?php include 'includes/header.php'; ?>

<main class="container my-5 flex-grow-1">
    <div class="row bg-white p-4 rounded shadow-sm border">
        
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="imagens/<?php echo $produto['imagem']; ?>" 
                 alt="<?php echo $produto['nome']; ?>" 
                 class="img-fluid rounded" 
                 style="max-height: 450px; object-fit: contain;">
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-center">
            
            <h1 class="fw-bold text-dark mb-2"><?php echo $produto['nome']; ?></h1>
            
            <h2 class="text-success fw-bold mb-4">
                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
            </h2>

            <div class="mb-4">
                <h5 class="fw-bold text-secondary">Descrição do Produto:</h5>
                <p class="text-muted lh-base">
                    <?php echo nl2br(htmlspecialchars($produto['descricao'])); ?>
                </p>
            </div>

            <div class="d-grid gap-2 d-md-flex mt-3">
                
                <a href="<?php echo $link_whatsapp; ?>" 
                   target="_blank" 
                   class="btn btn-success btn-lg px-4 py-2 fw-bold d-flex align-items-center justify-content-center">
                   💬 Comprar pelo WhatsApp
                </a>

                <a href="index.php?todos=1" class="btn btn-outline-dark btn-lg px-4 py-2">
                    Voltar ao Catálogo
                </a>

            </div>

        </div>

    </div>
</main>

<footer class="bg-dark text-white text-center p-4 mt-5">
    <p>© 2026 Adalto CELL - Todos os direitos reservados</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>