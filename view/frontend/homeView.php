<?php
$title = "Mes P'tites Emplettes Narbonnaises"; ?>

<?php ob_start(); ?>




<!-- START THE FEATURETTES -->
<div class="row featurette col-6">
<h2 class="h6 featurette-heading col-12 text-center mt-3">Bienvenue sur mes p'tites emplettes narbonnaises !</h2>
  <div class="presentation d-flex col-12 align-items-center justify-center">
    <p class="lead text-justify col-6">Ici, vous trouverez tous les commerçants de votre ville, ainsi que leurs produits ! En click&collect
      ou en livraison, passez vos achats en toute sérénité !</p>
    <div class="img-logo col-4">
    <img class="img-presentation img-fluid mx-auto" src="public/img/logo2.png" alt="logo web" />
    </div>
  </div>
  
</div>

<!-- SELECTION PROFUCT OF THE WEEK -->
<section class="selectionWeek">
  <h1 class="text-center">La P'tite Sélection de la Semaine</h1>

  <div class="productWeek row">
    <div class="featurette-product">
      <div class="img-product">
        <img class="img-product1" src="public/img/narbonne.jpg" />
        <div class="product">
          <p class="title-product">Pull manches courtes</p>
          <p class="description-product">Pull 100% cachemire blabla blabla</p>
          <p class="price">Prix : 25€</p>
          <p class="link">Vendeur : la Maison du Pull</p>
        </div>
      </div>
    </div>

    <div class="featurette-product">
      <div class="img-product">
        <img src="public/img/narbonne.jpg" />
        <div class="product">
          <p class="title-product">Pull manches courtes</p>
          <p class="description-product">Pull 100% cachemire blabla blabla</p>
          <p class="price">Prix : 25€</p>
          <p class="link">Vendeur : la Maison du Pull</p>
        </div>
      </div>
    </div>

    <div class="featurette-product">
      <div class="img-product">
        <img src="public/img/narbonne.jpg" />
        <div class="product">
          <p class="title-product">Pull manches courtes</p>
          <p class="description-product">Pull 100% cachemire blabla blabla</p>
          <p class="price">Prix : 25€</p>
          <p class="link">Vendeur : la Maison du Pull</p>
        </div>
      </div>
    </div>

    <div class="featurette-product">
      <div class="img-product">
        <img src="public/img/narbonne.jpg" />
        <div class="product">
          <p class="title-product">Pull manches courtes</p>
          <p class="description-product">Pull 100% cachemire blabla blabla</p>
          <p class="price">Prix : 25€</p>
          <p class="link">Vendeur : la Maison du Pull</p>
        </div>
      </div>
    </div>
  </div>
</section>
<hr class="featurette-divider">

<!-- NEW SELLERS OF THE WEEK -->
<section class="newSellers">
  <h1 class="text-center">Les P'tits Nouveaux !</h1>

  <div class="newSeller row">
    <div class="featurette-seller">
      <p class="nameSeller text-center">Promod</p>
      <div class="content-seller d-flex">
        <div class="seller">
          <p class="addressSeller">rue jules ferry<br>11100<br>Narbonne</p>
          <p class="linkShop"><a href="#">promod</a></p>
        </div>
        <div class="img-seller">
          <img src="public/img/narbonne.jpg" />
        </div>
      </div>
    </div>

    <div class="featurette-seller">
      <p class="nameSeller text-center">Promod</p>
      <div class="content-seller d-flex">
        <div class="seller">
          <p class="addressSeller">rue jules ferry<br>11100<br>Narbonne</p>
          <p class="linkShop"><a href="#">promod</a></p>
        </div>
        <div class="img-seller">
          <img src="public/img/narbonne.jpg" />
        </div>
      </div>
    </div>

    <div class="featurette-seller">
      <p class="nameSeller text-center">Promod</p>
      <div class="content-seller d-flex">
        <div class="seller">
          <p class="addressSeller">rue jules ferry<br>11100<br>Narbonne</p>
          <p class="linkShop"><a href="#">promod</a></p>
        </div>
        <div class="img-seller">
          <img src="public/img/narbonne.jpg" />
        </div>
      </div>
    </div>
  </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>