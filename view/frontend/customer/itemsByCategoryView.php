<?php $title = "Articles par catégories"; ?>

<?php ob_start(); ?>
<section class="category text-center col-12 mx-auto">
<p class="returnLink w-50"><a href="index.php?action=category">Retour à la liste</a></p>
    <div class="jumbotron col-12">
        <img class="card-img-top col-6 mx-auto" src="<?= $categories['path_cat']; ?>" alt="<?= $categories['url_path'];?>">

        <h1 class="display-4 text-primary"><?= $categories['category_Name']; ?></h1>
    </div>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= $itemsCategories['url_img']; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $itemsCategories['nameItem']; ?></h5>
            <p class="card-text">Ref :<?= $itemsCategories['ref']; ?></p>
            <p class="card-text">Descritpion :<?= $itemsCategories['descriptionItem']; ?></p>
            <p class="card-text">Prix :<?= $itemsCategories['price']; ?> €</p>
            <p class="card-text">Taille :<?= $itemsCategories['size']; ?></p>
            <p class="card-text">En stock :<?= $itemsCategories['stock']; ?></p>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>