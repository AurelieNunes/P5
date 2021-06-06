<?php $title = "Catégories"; ?>

<?php ob_start(); ?>
<section id="categoryList">
    <h2 class="h1 text-center list-categories bg-primary text-white mx-auto pb-2 pt-2 pr-2 pl-2">Toutes les catégories</h2>

    <div class="listing mx-auto d-flex flex-wrap justify-content-around align-items-center">
        <?php
        foreach ($categories as $category) {
        ?>
            <div class="card mr-2 ml-2 mb-4 text-center col-10">
                <img class="card-img-top mx-auto" src="<?= $category['path_cat']; ?>" alt="<?= $category['url_path']; ?>">
                <div class="card-body">
                    <h3 class="card-title orange"><?= $category['category_Name']; ?></h3>
                    <a href="index.php?action=displayItemsByCategory&amp;category_id=<?= $category['id']; ?>" class="btn btn-primary text-white">Aller voir</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>