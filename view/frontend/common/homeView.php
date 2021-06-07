<?php
$title = "Mes P'tites Emplettes Narbonnaises"; ?>

<?php ob_start(); ?>

<!-- START THE FEATURETTES -->
<div class="featurette-expand-lg-presentation">
  <h1 class="h3 featurette-heading-presentation-expand-lg pt-2 pb-2 text-center font-italic text-primary m-auto pb-3 pr-2 pl-2">
    Bienvenue sur mes p'tites emplettes narbonnaises !</h1>
  <div class="presentation-expand-lg">
    <p class="presentation-expand-lg-text text-center text-black col-10 m-auto">Ici, vous trouverez tous les commerçants de votre ville, ainsi que leurs produits ! Grâce aux click&collect, réservez vos achats en toute sérénité !</p>
    <div class="img-logo m-auto col-3">
      <img class="img-presentation img-fluid mx-auto" src="public/img/logo2.png" alt="logo web" />
    </div>
  </div>
</div>

<!-- SELECTION PROFUCT OF THE WEEK -->
<section class="selectionWeek">
  <h2 class="text-center expand-lg bg-primary text-white mx-auto font-italic pb-2 pt-2 pr-2 pl-2 h2">La P'tite Sélection de la Semaine</h2>
  <div class="productWeek-expand-lg col-10 m-auto">
    <?php
    foreach ($itemsRandom as $randomItem) {
      $idSeller = $randomItem['id_seller'];
      $seller = $sellers[$idSeller];
    ?>
      <article class="featurette-product-expand-lg col-12 mb-5">
        <div class="img-product-expand-lg col-10 m-auto">
          <img class="img-product1 col-12" src="<?= $randomItem['url_img'];
                                                ?>" alt="<?= $randomItem['alt-item']; ?>" />
        </div>
        <div class="product pt-2 text-center">
          <h3 class="title-product orange h5"><?= $randomItem['nameItem'];
                                              ?></h3>
          <p class="price mb-0"><u>Prix</u> :<?= $randomItem['price']; ?> €</p>
          <p class="stock mb-0">En stock : <?= $randomItem['stock']; ?></p>
          <p class="link-seller mb-0">
            <a class="nav-link h5 mb-0 pb-0 orange" href="index.php?action=cardSeller&amp;id_seller=<?= $idSeller; ?>"><?= $seller[0]; ?></a>
          </p>
          <p class="link-ReadMore h6">
            <a class="nav-link" href="index.php?action=descriptionItem&amp;itemId=<?= $randomItem['id']; ?>">Voir plus...</a>
          </p>
        </div>
      </article>
    <?php
    }
    ?>
  </div>
</section>

<!-- NEW SELLERS OF THE WEEK -->
<section class="newSellers-expand-lg m-auto">
  <h2 class="expand-lg text-center pt-2 pb-2 pr-2 pl-2 bg-primary text-white font-italic h2">Les P'tits Commerçants !</h2>

  <div class="newSeller-expand-lg m-auto mb-4">
    <?php foreach ($sellerRandom as $randomSeller) {
    ?>
      <div class="featurette-seller-home-expand-lg col-10 m-auto mb-4">
        <p class="link-seller-expand-lg mb-4">
          <a class="nav-link orange text-center h4 pb-0 mb-0" href="index.php?action=cardSeller&amp;id_seller=<?= $randomSeller['id']; ?>"><?= $randomSeller['company']; ?></a>
        </p>
        <div class="content-seller-expand-lg d-flex col-12 m-auto align-center">
          <div class="sellerexpand-lg col-5">
            <p class="addressSeller mb-0 h6 text-black text-primary">Adresse</p>
            <p class="mb-0"> <?= $randomSeller['addressSeller']; ?></p>
            <p class="mb-0"><?= $randomSeller['cpSeller']; ?> <?= $randomSeller['citySeller']; ?></p>
          </div>
          <div class="img-sellerShop col-6 pl-0 pr-0 m-auto">
            <img class="col-12" src="<?= $randomSeller['url_pathShop']; ?>" alt="<?= $randomSeller['alt-seller']; ?>" />
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>