<?php $title = "Description Produit"; ?>

<?php ob_start(); ?>

<h1 class="h5 text-center mb-5">Description produit</h1>
<div class="featurette-product-seller d-flex w-100">
    <div class="img-product-seller mx-auto mt-5 pl-5 pr-5">
        <img class="img-product1" src="<?= $itemsDetails['url_img'];
        // var_dump($itemsDetails['url_img']);
        // die(); ?>">
    </div>
        <div class="product mt-5 mr-5 col-12">
        <h4 class="card-title h6"><?= $itemsDetails['ref']; ?></h4>
            <p class="card-text"><?= $itemsDetails['descriptionItem']; ?></p>
            <p>Prix : <?= $itemsDetails['price']; ?>€</p>
            <p>Taille : <?= $itemsDetails['size']; ?></p>
            <p>En stock : <?= $itemsDetails['stock']; ?></p>
        </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>