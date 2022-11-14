<?php
    include "configs.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel</title>
    <base href="http://localhost/marvel/">
    <link href="https://fonts.googleapis.com/css2?family=Marvel&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/icons8-vingadores-144.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/icons8-marvel-144.png" alt="Icone Marvel" class="navbar-icon">
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
                        <a class="nav-link" href="creators">Creators</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
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

    <footer class="bg-footer">
        <div class="footer-inner">
            <p>
                Developed by Paola Sensato e Kleber Trugilo
            </p>
            <a href="https://github.com/paolasensato/marvel" target="_blank" class="fs-1" alt="github">
                <i class="fab fa-github-square"></i>
            </a>  
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel.js"></script>
</body>

</html>