<?php
$title = "Mes P'tites Emplettes Narbonnaises"; ?>

<?php ob_start(); ?>

<?php
// si compte bien créé, affiche message de confirmation à l'utilisateur
if (isset($_GET['account-status']) && $_GET['account-status'] == 'account-successfully-created') {
	echo '<div class="alert alert-dismissible alert-success text-center" id="success">
	<p><strong>Votre compte a bien été créé !</strong></p>
	<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
}

if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
	echo '<p class="alert alert-dismissible alert-warning text-center" id="success">Vous êtes bien deconnecté !</p>';
}
?>


<!-- START THE FEATURETTES -->
<div class="row featurette">
<h2 class="h6 featurette-heading w-100 text-center mt-3">Bienvenu sur mes p'tites emplettes narbonnaises !</h2>
  <div class="presentation d-flex justify-content-around">
    <p class="lead text-justify">Ici, vous trouverez tous les commerçants de votre ville, ainsi que leurs produits ! En click&collect
      ou en livraison, passez vos achats en toute sérénité !</p>
    <div class="img-logo">
    <img class="img-presentation img-fluid mx-auto" src="public/img/logo.png" alt="logo web" />
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