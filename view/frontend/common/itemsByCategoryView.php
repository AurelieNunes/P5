<?php $title = "Articles par catégories"; ?>

<?php ob_start(); ?>
<section class="category text-center col-12 mx-auto">
    <p class="returnLink text-center mx-auto pt-2"><a class="h6 text-primary" href="index.php?action=category">Retour à la liste</a></p>

    <div class="jumbotron mb-0 p-0">
        <img class="card-img-top mx-auto" src="<?= $categories['path_cat']; ?>" alt="<?= $categories['url_path'];?>">

        <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white mx-auto">
            <?= $categories['category_Name']; ?></h1>
    </div>
    <div>
        <?php
            foreach ($itemsCategories as $item) {
                ?>
        <article class="card mx-auto">
            <img class="card-img-top mt-4" src="<?= $item['url_img']; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-primary"><?= $item['nameItem']; ?></h5>
                <p class="card-text">Ref :<?= $item['ref']; ?></p>
                <p class="card-text">Descritpion :<?= $item['descriptionItem']; ?></p>
                <p class="card-text">Prix :<?= $item['price']; ?> €</p>
                <?php
            if(!empty($item['size']))
            {
            ?>
                <p class="card-text">Taille :<?= $item['size']; ?></p>
                <?php
            }
            ?>
                <p class="card-text">En stock :<?= $item['stock']; ?></p>
                <a class="nav-link h4" href="index.php?action=cardSeller&amp;id_seller=<?= $item['id_seller']; ?>">Voir
                    la fiche
                    vendeur</a>
        </article>
        <?php
            }
            ?>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>