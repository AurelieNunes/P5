<?php
$title = "Mes P'tites Emplettes Narbonnaises"; ?>

<?php ob_start(); ?>

<!-- START THE FEATURETTES -->
<div class="featurette-expand-lg">
  <h2 class="h3 featurette-heading-presentation-expand-lg text-center font-italic text-primary m-auto pb-3 pr-2 pl-2">
    Bienvenue sur mes p'tites emplettes narbonnaises !</h2>
  <div class="presentation-expand-lg">
    <p class="presentation-expand-lg text-center text-black col-10 m-auto">Ici, vous trouverez tous les commerçants de
      votre ville, ainsi que leurs produits
      ! Grâce aux click&collect, réservez vos achats en toute sérénité !</p>
    <div class="img-logo m-auto col-3">
      <img class="img-presentation img-fluid mx-auto" src="public/img/logo2.png" alt="logo web" />
    </div>
  </div>
</div>

<!-- SELECTION PROFUCT OF THE WEEK -->
<section class="selectionWeek">
  <h1 class="text-center expand-lg bg-primary text-white mx-auto font-italic h2">La P'tite Sélection de la Semaine</h1>

  <div class="productWeek-expand-lg">
    <?php
  foreach($itemsRandom as $randomItem)
  {
    $idSeller = $randomItem['id_seller'];
    $seller = $sellers[$idSeller];
   
  ?>
    <div class="featurette-product-expand-lg align-center mt-4">
      <div class="img-product-expand-lg m-auto">
        <img class="img-product1 col-6" src="<?= $randomItem['url_img'];
        ?>" />
        <div class="product pt-2">
          <p class="title-product h5 text-primary text-center"><?= $randomItem['nameItem'];
          ?></p>
          <p class="price mb-0"><u>Prix</u> :<?= $randomItem['price'];?> €</p>
          <p class="stock mb-0">En stock : <?= $randomItem['stock'];?></p>
          <p class="link-seller h6 mb-0">
            <a class="nav-link text-primary pb-0"
              href="index.php?action=cardSeller&amp;id_seller= <?= $idSeller; ?>"><?= $seller[0]; ?></a>
          </p>
          <p class="link-ReadMore text-black text-center">
            <a class="nav-link h6 pb-0"
              href="index.php?action=descriptionItem&amp;itemId=<?= $randomItem['id']; ?>">Voir
              plus...</a>
          </p>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
</section>

<!-- NEW SELLERS OF THE WEEK -->
<section class="newSellers-expand-lg">
  <h1 class="expand-lg text-center bg-primary text-white font-italic h2">Les P'tits Commerçants !
  </h1>

  <div class="newSeller-expand-lg">
    <?php foreach ($sellerRandom as $randomSeller) 
    {
      if ($randomSeller['isAdmin'] != '1'){
    ?>
    <div class="featurette-seller-expand-lg">
      <p class="link-seller-expand-lg">
        <a class="nav-link text-primary text-center h5"
          href="index.php?action=cardSeller&amp;id_seller= <?= $randomSeller['id']; ?>"><?= $randomSeller['company']; ?></a>
      </p>
      <div class="content-seller-expand-lg d-flex col-12">
        <div class="sellerexpand-lg">
          <p class="addressSeller mb-0 h6 text-black">Adresse</p>
          <p class="mb-0"> <?= $randomSeller['addressSeller'];?></p>
          <p class="mb-0"><?= $randomSeller['cpSeller'];?> <?= $randomSeller['citySeller'];?></p>
        </div>
        <div class="img-sellerShop col-8 mb-4 pl-0 pr-0">
          <img class="col-12" src="<?= $randomSeller['url_pathShop'];?>" />
        </div>
      </div>
    </div>
    <?php
    }
  }
    ?>
  </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/common/template.php'); ?>