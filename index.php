<?php
    include "configs.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel</title>
    <base href="http://localhost/marvel/">
    <link rel="shortcut icon" href="images/icons8-vingadores-144.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/icons8-marvel-144.png" alt="Icone Marvel">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comics">Comics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="characters">Characters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="series">Series</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="creators">Creators</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato">Contato</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
        <?php
        $pagina = "home";

        if (isset($_GET["param"])) {
            $param = trim($_GET["param"]);
            $param = explode("/", $param);

            $pagina = $param[0];
        }

        $pagina = "paginas/{$pagina}.php";

        if (file_exists($pagina)) {
            include $pagina;
        } else {
            include "paginas/erro.php";
        }
        ?>
    </main>

    <footer class="bg-light">
        <p class="text-center">
            Desenvolvido por Paola e Kleber
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel.js"></script>
</body>

</html>