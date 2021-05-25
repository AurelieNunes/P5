<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="/public/img/Logo2.png">
    <meta name="description"
        content="Mes P'tites Emplettes Narbonnaises, le site des commerces de proximité à votre portée !">

    <meta name="author" content="NUNES Aurélie" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">

    <!--Open Graph data -->
    <meta property="og:title" content="Mes P'tites Emplettes Narbonnaises!" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://p5-mesptitscommerces.aurelie-nunes.fr/" />
    <meta property="og:description" content="Ici, vous trouverez tous les commerçants de
      votre ville, ainsi que leurs produits
      ! Grâce aux click&collect, réservez vos achats en toute sérénité !" />
    <title>Mes P'tites Emplettes Narbonnaises</title>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="./public/css/style.css" /> -->
    <!-- CSS only CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--CSS -->
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/media375.css"/>
    <link rel="stylesheet" href="./public/css/media425.css"/>
    <link rel="stylesheet" href="./public/css/media478.css"/>
    <link rel="stylesheet" href="./public/css/media544.css"/>
    <link rel="stylesheet" href="./public/css/media700.css"/>
    <link rel="stylesheet" href="./public/css/media768.css"/>
    <link rel="stylesheet" href="./public/css/media992.css"/>
    <link rel="stylesheet" href="./public/css/media1024.css"/>
    <link rel="stylesheet" href="./public/css/media1200.css"/>
    <link rel="stylesheet" href="./public/css/media1440.css"/>
    <link rel="stylesheet" href="./public/css/media1900.css"/>
    <link rel="stylesheet" href="./public/css/media2560.css"/>

</head>

<body>
    <header>
        <div class="jumbotron-customer fixed-top bg-white">
            <p class="logo text-center col-12">
                <img class="col-8" src="./public/img/Logo.png" alt="logo site">
            </p>
            <h1 class="title-website orange font-italic">Mes P'tites Emplettes Narbonnaises</h1>
            <div id="widget" class="white">
                <div class="widgetCityName"></div>
                <div class="widgetCurrentTemp"></div>
                <div class="widgetCurrentWeather"></div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-customer navbar-light bg-orange fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand white" href="index.php?action=home">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="index.php?action=listSellers">Commerçants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=category">Catégories</a>
                        </li>
                    </ul>

                    <ul class="session-users list-unstyled mb-0">
                            <?php
                        if(!empty($_SESSION['mailSubmitSeller'])){
                            echo '<li class="nav-item-dashboard white">
                            <a class="nav-link text-light" href="index.php?action=dashboardSeller">Tableau de bord</a>
                        </li>';
                        }

                        if (!empty($_SESSION))  {
                            echo '<li class="nav-item-logout white"><a class="nav-link-logout text-light" href="index.php?action=logout">Déconnexion</a></li>';
                        } else {
                            echo '<li class="nav-item-login"><a class="nav-link text-light" href="index.php?action=loginCustomer">Connexion / Inscription</a></li>';
                        }
                        
                        if (!empty($_SESSION['mailSubmitCustomer'])) {
                            echo '<li class="nav-item-mailCustomer white"><p class ="session text-white text-center">Bonjour ' . ' '.htmlspecialchars($_SESSION['mailSubmitCustomer']) . '</p></li>';
                        }

                        if(!empty($_SESSION['mailSubmitCustomer'])){
                            echo '<li class="nav-item-subCustomer"><a class="nav-link-fas white text-light" href="index.php?action=getCustomer"><i
                            class="text-light fas fa-user"></i></a></li>';
                        }

                        if(!empty($_SESSION) && $_SESSION['isAdmin'] === '1') {
							echo '<li class="nav-item-admin"><a class="white nav-link" href="index.php?action=admin"> Administration</a></li>';
							}

                        if(!empty($_SESSION['mailSubmitSeller'])){
                            echo '<li class="nav-item-mailSeller"><p class="session white text-center">Bonjour' . ' . ' . ' '.htmlspecialchars($_SESSION['mailSubmitSeller']) . '</p></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main class="main-template">
        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <!-- /.container -->
        <section class="container-expand-lg marketing">

            <?= $content ?>

        </section>

    </main>
    <!-- FOOTER -->
    <footer>
        <nav class="navbar-common navbar navbar-footer navbar-expand-lg navbar-dark bg-orange">
            <ul class="navbar-nav-expand-lg list-unstyled col-12 m-auto">
                <li class="nav-item-expand-lg active">
                    <a class="nav-link-expand-lg text-light text-center text-decoration-none"
                        href="index.php?action=about">
                        <p class="expand-lg">Qui se cache derrière ce projet ?</p>
                    </a>
                </li>
                <li class="nav-item-expand-lg">
                    <a class="nav-link-expand-lg text-light text-center text-decoration-none"
                        href="mailto:aurelie.nunes.dev@gmail.com?subject=PremierContact&body=Bonjour,">
                        <p class="expand-lg mb-0">Contact</p>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>

    <!-- JS -->
    <script src="./public/JS/weather.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>