<?php $title = "Description Produit"; ?>

<?php ob_start(); ?>
<p class="returnLink text-center mx-auto pt-2"><a class="h6" href="index.php?action=home">Retour au menu</a></p>
<h1 class="h5 text-center mb-5">Description produit</h1>
<article class="featurette-product-seller d-flex w-100 mx-auto justify-content-around">
    <div class="img-product-seller col-4 mt-5 mb-5">
        <img class="img-product col-10" src="<?= $itemsDetails['url_img']; 
        
?>">
    </div>
    <div class="product col-2 mt-5 mb-5">
        <h4 class="card-title h6">Ref : <?= $itemsDetails['ref']; ?></h4>
        <p class="card-text">Description : <?= $itemsDetails['descriptionItem']; ?></p>
        <p>Prix : <?= $itemsDetails['price']; ?>€</p>
        <p>Taille : <?= $itemsDetails['size']; ?></p>
        <p>En stock : <?= $itemsDetails['stock']; ?></p>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>