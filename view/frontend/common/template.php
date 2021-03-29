<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

    <link rel="icon" type="image/png" href="/public/img/Logo2.png">
    <meta name="description"
        content="Mes P'tites Emplettes Narbonnaises, le site des commerces de proximité à votre portée !">

    <meta name="author" content="NUNES Aurélie" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">

    <!--Open Graph data -->
    <meta property="og:title" content="Mes P'tites Emplettes Narbonnaises!" />
    <meta property="og:type" content="website" />
    <!-- <meta property="og:url" content="" /> -->
    <!-- <meta property="og:description" content="" /> -->
    <title>Mes P'tites Emplettes Narbonnaises</title>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./public/css/style.css" />
</head>

<body>
    <header>
        <div class="jumbotron fixed-top">
            <div class="home-title d-flex justify-content-around">
                <p class="logo">
                    <img src="./public/img/Logo.png" alt="logo site">
                </p>
                <h1 class="title text-primary">Mes P'tites Emplettes Narbonnaises</h1>
                <p class="narbonne">
                    <img src="./public/img/narbonne.jpg" alt="">
                </p>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar bg-primary fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-around" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 text-light">
                        <li class="nav-item active">
                            <a class="nav-link text-light" aria-current="page"
                                href="view/frontend/customer/homeView.php">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light" href="view/frontend/customer/listSellersView.php">Commerçants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="view/frontend/customer/listCategoryView.php">Catégories</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php 
                        if (!empty($_SESSION))  {
                            echo '<li class="nav-item ml-auto p-2"><a class="nav-link text-light" href="index.php?action=logout">Déconnexion</a></li>';
                        } else {
                            echo '<li class="nav-item ml-auto p-2"><a class="nav-link text-light" href="index.php?action=loginCustomer">Connexion / Inscription</a></li>';
                        }
                        
                        if (!empty($_SESSION['mailSubmitCustomer'])) {
                            echo '<li class="nav-item d-flex ml-auto p-2"><p class ="m-auto pr-2 text-white text-uppercase">Bonjour<p class="m-auto text-white">'  . htmlspecialchars($_SESSION['mailSubmitCustomer']) . '</li>';
                        }

                        if(!empty($_SESSION['mailSubmitCustomer'])){
                            echo '<li class="nav-item d-flex ml-auto p-2"><a class="nav-link text-light" href="index.php?action=accountCustomer"><i
                            class="text-light fas fa-user"></i></a></li>';
                        }
                        ?>

                        <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?action=loginCustomer">Se connecter</a>
                        </li> -->
                        <!-- <li class="nav-item">
                        <a class="nav-link text-light" href="index.php?action=subscribeCustomer">S'inscrire</a>
                        </li> -->
                        <!-- <li class="nav-item m-auto">
                            <a class="nav-link text-light" href="view/frontend/dashboardClientView.php.php"><i
                                    class="text-light fas fa-user"></i></a>
                        </li> -->
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
        <section class="container marketing col-12">

            <?= $content ?>

        </section>

    </main>
    <!-- FOOTER -->
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex mb-2">
            <ul class="navbar-nav mr-auto w-100 justify-content-around">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=about">
                        <p>RGPD</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="#">
                        <p>Mentions Légales</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:aurelie.nunes.dev@gmail.com?subject=PremierContact&body=Bonjour,">
                        <p>Contact</p>
                    </a>
                </li>

            </ul>
        </nav>
    </footer>
</body>

</html>