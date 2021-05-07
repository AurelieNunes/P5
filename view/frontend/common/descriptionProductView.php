<?php $title = "Description Produit"; ?>

<?php ob_start(); ?>

<section id="detailProduct">
    <h1 class="h5 text-center mb-5 bg-primary white pb-2 pt-2 pr-2 pl-2">Description produit</h1>
    <article class="featurette-product-seller col-10 m-auto">
        <div class="img-product-seller col-12 mt-5 mb-5">
            <img class="img-product col-12" src="<?= $itemsDetails['url_img']; 
        
?>">
        </div>
        <div class="product mt-5 mb-5 text-center m-auto">
            <h4 class="card-title h6">Ref : <?= $itemsDetails['ref']; ?></h4>
            <p class="card-text">Description : <?= $itemsDetails['descriptionItem']; ?></p>
            <p>Prix : <?= $itemsDetails['price']; ?>€</p>
            <p>Taille : <?= $itemsDetails['size']; ?></p>
            <p>En stock : <?= $itemsDetails['stock']; ?></p>
        </div>
    </article>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>