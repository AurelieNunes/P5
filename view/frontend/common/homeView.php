<?php
$title = "Mes P'tites Emplettes Narbonnaises"; ?>

<?php ob_start(); ?>

<!-- START THE FEATURETTES -->
<div class="row featurette mx-auto col-6">

  <h2 class="h6 featurette-heading col-12 text-center mt-3">Bienvenue sur mes p'tites emplettes narbonnaises !</h2>
  <div class="presentation d-flex col-12 align-items-center justify-center">
    <p class="lead text-justify col-6">Ici, vous trouverez tous les commerçants de votre ville, ainsi que leurs produits
      ! En click&collect
      ou en livraison, passez vos achats en toute sérénité !</p>
    <div class="img-logo col-4">
      <img class="img-presentation img-fluid mx-auto" src="public/img/logo2.png" alt="logo web" />
    </div>
  </div>
</div>

<!-- SELECTION PROFUCT OF THE WEEK -->
<section class="selectionWeek">
  <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white col-8 mx-auto">La P'tite Sélection de la Semaine</h1>

  <div class="productWeek row justify-content-around m-0 flex-wrap">
    <?php
  foreach($itemsRandom as $randomItem)
  {
    $idSeller = $randomItem['id_seller'];
    $seller = $sellers[$idSeller];
   
  ?>
    <div class="featurette-product text-align-center">
      <div class="img-product mx-auto mt-2">
        <img class="img-product1" src="<?= $randomItem['url_img'];
        ?>" />
        <div class="product pt-2">
          <p class="title-product h5 text-center"><?= $randomItem['nameItem'];
          ?></p>
          <p class="price h6">Prix : <?= $randomItem['price'];?> €</p>
          <p class="link-seller h6">
            <a class="nav-link h6 text-primary"
              href="index.php?action=cardSeller&amp;id_seller= <?= $idSeller; ?>"><?= $seller[0]; ?></a>
          </p>
          <!-- <?php
            // var_dump($idSeller);
            // die();
          ?> -->
          <p class="link-ReadMore text-center">
            <a class="nav-link h6" href="index.php?action=descriptionItem&amp;itemId=<?= $randomItem['id']; ?>">Voir
              plus...</a>
          </p>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
</section>
<hr class="featurette-divider mt-4">

<!-- NEW SELLERS OF THE WEEK -->
<section class="newSellers">
  <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white col-8 mx-auto">Les P'tits Commerçants !</h1>

  <div class="newSeller row">
    <?php foreach ($sellerRandom as $randomSeller) 
    {
    ?>
    <div class="featurette-seller">
      <p class="nameSeller text-center"><?= $randomSeller['company'];?></p>
      <div class="content-seller d-flex">
        <div class="seller">
          <p class="addressSeller text-primary"><?= $randomSeller['addressSeller'];?></p><br>
          <p><?= $randomSeller['cpSeller'];?></p><br>
          <p><?= $randomSeller['citySeller'];?></p>
          <p class="linkShop"><a href="#">promod</a></p>
        </div>
        <div class="img-seller">
          <img src="public/img/narbonne.jpg" />
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/common/template.php'); ?>