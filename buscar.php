<?php

include 'conexao.php';

$busca = $_GET['busca'];

$sql = "SELECT * FROM produtos
        WHERE nome LIKE '%$busca%'";

$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Busca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Resultado da busca por: <?php echo $busca; ?></h2>

    <hr>

    <?php

    if(mysqli_num_rows($resultado) > 0)
    {
        while($produto = mysqli_fetch_assoc($resultado))
        {
            ?>

            <div class="card mb-3">
                <div class="card-body">

                    <h4><?php echo $produto['nome']; ?></h4>

                    <p><?php echo $produto['descricao']; ?></p>

                    <strong>
                        R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                    </strong>

                </div>
            </div>

            <?php
        }
    }
    else
    {
        echo "<p>Nenhum produto encontrado.</p>";
    }

    ?>

</div>

</body>
</html>