<?php

include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";

$resultado = mysqli_query($conexao, $sql);

$produto = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

```
<meta charset="UTF-8">

<title><?php echo $produto['nome']; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
```

</head>

<body>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">

```
<div class="row">

    <div class="col-md-6">

        <img src="imagens/<?php echo $produto['imagem']; ?>"
             class="img-fluid">

    </div>

    <div class="col-md-6">

        <h1><?php echo $produto['nome']; ?></h1>

        <p><?php echo $produto['descricao']; ?></p>

        <h3>
            R$ <?php echo number_format($produto['preco'],2,',','.'); ?>
        </h3>

        <a href="index.php" class="btn btn-secondary">
            Voltar
        </a>

    </div>

</div>
```

</div>

</body>

</html>
