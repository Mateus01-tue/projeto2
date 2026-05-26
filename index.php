<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adalto CELL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css?v=1">


</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            ADALTO CELL
        </a>

        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Início</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sobre.php">Sobre</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>

            </ul>

            <form class="d-flex">

                <input class="form-control me-2"
                       type="search"
                       placeholder="Pesquisar">

                <button class="btn btn-dark">
                    Buscar
                </button>

            </form>

        </div>

    </div>

</nav>
<main>
<section class="banner">

    <img src="imagens/banner2.png"
         alt="Banner do Adalto Cell" title="Adalto Cell banner">

</section>

<section>

    <div class="container">

        <h2 class="text-center">
            Celulares em Destaque
        </h2>

        <div class="row">

            <!-- Produto 1 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/s25.png"
                         class="produto-img"
                         alt="Samsung S25">

                    <div class="card-body text-center">

                        <h5>Samsung S25</h5>

                        <p>256GB • 12GB RAM</p>

                        <a href="produto.php" class="btn btn-dark">
                        Ver Produto
                          
                    </a>

                    </div>

                </div>

            </div>

            <!-- Produto 2 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/iphone14.png"
                         class="produto-img"
                         alt="iPhone 14">

                    <div class="card-body text-center">

                        <h5>iPhone 14</h5>

                        <p>128GB • iOS</p>

                    </div>

                </div>

            </div>

            <!-- Produto 3 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/motorola.png"
                         class="produto-img"
                         alt="Motorola">

                    <div class="card-body text-center">

                        <h5>Motorola Edge</h5>

                        <p>256GB • Android</p>

                    </div>

                </div>

            </div>

            <!-- Produto 4 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/xiaomi.png"
                         class="produto-img"
                         alt="Xiaomi">

                    <div class="card-body text-center">

                        <h5>Xiaomi Redmi</h5>

                        <p>256GB • 8GB RAM</p>

                    </div>

                </div>

            </div>

        </div>

    </div>


</section>

<section>

    <div class="container">

        <h2 class="text-center">
            Acessórios e Tecnologia
        </h2>

        <div class="row mt-4">

            <!-- Produto 1 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/tv.png"
                         class="produto-img"
                         alt="Smart TV">

                    <div class="card-body text-center">

                        <h5>Smart TV</h5>

                        <p>50 Polegadas • 4K</p>

                    </div>

                </div>

            </div>

            <!-- Produto 2 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/fone.png"
                         class="produto-img"
                         alt="Fone Bluetooth">

                    <div class="card-body text-center">

                        <h5>Fone Bluetooth</h5>

                        <p>Sem fio • Bluetooth</p>

                    </div>

                </div>

            </div>

            <!-- Produto 3 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/teclado.png"
                         class="produto-img"
                         alt="Teclado Gamer">

                    <div class="card-body text-center">

                        <h5>Teclado Gamer</h5>

                        <p>RGB • Mecânico</p>

                    </div>

                </div>

            </div>

            <!-- Produto 4 -->
            <div class="col-md-3">

                <div class="card">

                    <img src="imagens/caixa.png"
                         class="produto-img"
                         alt="Caixa de Som">

                    <div class="card-body text-center">

                        <h5>Caixa JBL</h5>

                        <p>Bluetooth • Portátil</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<footer class="bg-dark text-white text-center p-4">

    <p>
        © 2026 Adalto CELL - Todos os direitos reservados
    </p>

</footer>

</body>
</html>