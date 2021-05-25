<?php $title = "Articles par catégories"; ?>

<?php ob_start(); ?>
<section id="category" class="text-center col-12 mx-auto">

    <div class="jumbotron-categories mb-0 p-0 col-10 m-auto">
        <img class="card-img-top mx-auto" src="<?= $categories['path_cat']; ?>" alt="<?= $categories['url_path'];?>">

        <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-orange text-white m-auto"><?= $categories['category_Name']; ?></h1>
    </div>
    <div>
        <?php
            foreach ($itemsCategories as $item) {
                ?>
        <article class="card mx-auto col-10 m-auto mb-4">
            <img class="card-img-top mt-4" src="<?= $item['url_img']; ?>" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title orange"><?= $item['nameItem']; ?></h4>
                <p class="card-text">Ref :<?= $item['ref']; ?></p>
                <p class="card-text">Descritpion :<?= $item['descriptionItem']; ?></p>
                <p class="card-text mb-0">Prix :<?= $item['price']; ?> €</p>
                <?php
            if(!empty($item['size']))
            {
            ?>
                <p class="card-text mb-0">Taille :<?= $item['size']; ?></p>
                <?php
            }
            ?>
                <p class="card-text mb-0">En stock :<?= $item['stock']; ?></p>
                <a class="nav-link h5" href="index.php?action=cardSeller&amp;id_seller=<?= $item['id_seller']; ?>">Voir la fiche vendeur</a>
        </article>
        <?php
            }
            ?>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>