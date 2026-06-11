
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="style.css?v=1">

<nav class="navbar navbar-expand-lg bg-white border-bottom">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            <img src="imagens/logo.png" alt="Logo AdaltoCell" class="logo-header">
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

        <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
                
                <form action="index.php" method="GET" class="d-flex">
                    <input class="form-control me-2"
                           type="search"
                           name="busca"
                           placeholder="Pesquisar">
                    <button type="submit" class="btn btn-dark">
                        Buscar
                    </button>
                </form>

            <?php } ?>
        </div>

    </div>

</nav>