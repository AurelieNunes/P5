<?php $title = "Tableau de Bord"; ?>

<?php ob_start(); ?>
<section id="dashboardClient">
  <a class="h3 nav-link active text-center" href="#">
    <span data-feather="home"></span>
    Tableau de Bord<span class="sr-only">(current)</span>
  </a>
  <div class="container-fluid d-flex">

    <div class="row">
      <p class="h6 text-center">Bonjour
        <!--Pseudo Client-->
      </p>
      <nav class="col-md-12 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="myPurchase"></span>
                Mes Achats
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Mon Panier
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="wishlist"></span>
                Ma Wishlist
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="myAccount"></span>
                Mon compte
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>


</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>