<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>

    <link rel="icon" type="image/png" href="../../public/img/logo2.png">
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

    <!-- Fonawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <!-- CSS -->
    <link href="./public/css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="jumbotron fixed-top">
            <div class="home-title d-flex justify-content-around">
                <p class="logo col-1">
                    <img src="public/img/logo2.png" alt="logo site">
                </p>
                <h1 class="title text-primary font-italic">Mes P'tites Emplettes Narbonnaises</h1>
                <p class="narbonne">
                    <img src="public/img/narbonne.jpg" alt="">
                </p>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar bg-primary fixed-top">
            <div class="collapse navbar-collapse justify-content-around primary" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 text-light">
                    <li class="nav-item active">
                        <a class="h6 mb-0 nav-link text-light" aria-current="page" href="index.php?action=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                            <a class="h6 mb-0 nav-link text-light" href="index.php?action=listSellers">Commerçants</a>
                        </li>
                        <li class="nav-item">
                            <a class="h6 mb-0 nav-link text-light" href="index.php?action=category">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="h6 mb-0 nav-link text-light" href="index.php?action=dashboardSeller">Tableau de bord</a>
                        </li>
                </ul>
                <ul class="navbar-nav">
                    <?php 
                        if (!empty($_SESSION))  {
                            echo '<li class="h6 mb-0 nav-item ml-auto p-2"><a class="nav-link text-light" href="index.php?action=logout">Déconnexion</a></li>';
                        } else {
                            echo '<li class="h6 mb-0 nav-item ml-auto p-2"><a class="nav-link text-light" href="index.php?action=loginSeller">Connexion / Inscription</a></li>';
                        }
                        if(!empty($_SESSION) && $_SESSION['isAdmin'] == '1') {
							echo '<li class="h6 mb-0 nav-item ml-auto p-2"><a class="text-white nav-link" href="index.php?action=admin"> Administration</a></li>';
							}
                        if (!empty($_SESSION)) {
                            echo '<li class="h6 mb-0 nav-item d-flex ml-auto p-2"><p class ="m-auto pr-2 text-white text-uppercase">Bonjour<p class="m-auto text-white">'  . htmlspecialchars($_SESSION['mailSubmitSeller']) . '</li>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <main class="main-template-back">
        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <!-- /.container -->
        <section class="container marketing">

            <?= $content ?>

        </section>
    </main>
    <!-- FOOTER -->
    <footer class="footer-seller">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex mb-2">
            <ul class="navbar-nav mr-auto w-100 justify-content-around">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=about">
                        <p>RGPD</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="listSellersView.php">
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