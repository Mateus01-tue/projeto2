<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Adalto CELL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

<div class="container my-5">

    <h2>Dashboard de Indicadores</h2>
    <p class="text-muted">Dados buscados da API (PHP + MySQL) e processados em TypeScript.</p>
    <p id="erro-dashboard" class="text-warning"></p>
    <hr>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="mb-3">Estoque crítico</h5>
                <ul id="lista-estoque-critico" class="list-group"></ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="mb-3">Categoria: Celulares</h5>
                <ul id="lista-celulares" class="list-group"></ul>
            </div>
        </div>
    </div>

    <a href="index.php" class="btn btn-outline-secondary mt-4">← Voltar ao site</a>
</div>

<script src="dashboard/dashboard.js"></script>
</body>
</html>
