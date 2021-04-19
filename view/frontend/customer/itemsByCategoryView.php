<?php $title = "Articles par catégories"; ?>

<?php ob_start(); ?>
<section class="category text-center col-12 mx-auto">
<p class="returnLink w-50"><a href="index.php?action=category">Retour à la liste</a></p>
    
    <div class="jumbotron col-12">
        <img class="card-img-top col-6 mx-auto" src="<?= $categories['path_cat']; ?>" alt="<?= $categories['url_path'];?>">

        <h1 class="display-4 text-primary"><?= $categories['category_Name']; ?></h1>
    </div>
    <?php
        foreach ($itemsCategories as $item) {
            ?>
    <article class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= $item['url_img']; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $item['nameItem']; ?></h5>
            <p class="card-text">Ref :<?= $item['ref']; ?></p>
            <p class="card-text">Descritpion :<?= $item['descriptionItem']; ?></p>
            <p class="card-text">Prix :<?= $item['price']; ?> €</p>
            <p class="card-text">Taille :<?= $item['size']; ?></p>
            <p class="card-text">En stock :<?= $item['stock']; ?></p>
        </article>
        <?php
        }
        ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>